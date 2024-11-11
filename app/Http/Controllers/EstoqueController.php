<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use App\Models\Estoque\EstoqueEntradas;
use App\Models\Estoque\EstoqueSaidas;
use App\Models\Estoque\EstoqueSangues;
use App\Models\TipoSanguineo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EstoqueController extends Controller
{
    public function index()
    {
        $return = [
            'estoque' => TipoSanguineo::whereNot('tipos', 'Não Sei')->get(),
        ];
        return view('estoque.index', $return);
    }

    public function gerenciamento($id)
    {
        $entradas = EstoqueEntradas::selectRaw("
                id_estoque, 
                quantidade, 
                estoque_sangues_entradas.id_cadastro as usuario, 
                estoque_sangues_entradas.created_at, 
                'Entrada' as tipo, 
                cadastros.id_tipo_sanguineo,
                cadastros.nome")
            ->join('cadastros', 'cadastros.id', 'estoque_sangues_entradas.id_cadastro')
            ->join('estoque_sangues', 'estoque_sangues.id', 'id_estoque')
            ->where('estoque_sangues.id_tipo_sanguineo', $id);

        $saidas = EstoqueSaidas::selectRaw("
                id_estoque, 
                quantidade, 
                estoque_sangues_saidas.id_usuario as usuario, 
                estoque_sangues_saidas.created_at, 
                'Saída' as tipo, 
                id_tipo_sanguineo,
                nome")
            ->join('users', 'users.id', 'estoque_sangues_saidas.id_usuario')
            ->join('estoque_sangues', 'estoque_sangues.id', 'id_estoque')
            ->where('id_tipo_sanguineo', $id);

        $linhas = $saidas->union($entradas)->get();

        $estoque = EstoqueSangues::findOrFail($id);

        $return = [
            'total' => $estoque->quantidade_atual,
            'registros' => $linhas,
            'id' => TipoSanguineo::findOrFail($id),
            'cadastrados' => Cadastro::pluck('nome', 'id'),
        ];

        return view('estoque.gerenciamento', $return);
    }

    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tipo' => 'required|in:1,2',
            'cadastrados' => 'required',
            'quantidade' => [
                'required',
                'min:0',
                'numeric',
                function ($attribute, $value, $fail) use ($request) {
                    $estoque = EstoqueSangues::findOrFail($request->id);
                    if ($estoque->quantidade_atual >= $estoque->capacidade_maxima) {
                        if ($value > 1000) {
                            return $fail('Não é permitido adicionar mais que 1000 quando o estoque está cheio.');
                        }
                    }
                    if ($request->tipo == 2 && $value > $estoque->quantidade_atual) {
                        return $fail('Quantidade de saída indisponível no estoque!');
                    }
                },
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->tipo == 1) { 
            $entrega = new EstoqueEntradas();
            $entrega->id_estoque = $request->id;
            $entrega->quantidade = $request->quantidade;
            $entrega->id_usuario = Auth::user()->id;
            $entrega->id_cadastro = $request->cadastrados;
            $entrega->save();
        }

        if ($request->tipo == 2) { 
            $entrega = new EstoqueSaidas();
            $entrega->id_estoque = $request->id;
            $entrega->quantidade = $request->quantidade;
            $entrega->id_usuario = Auth::user()->id;
            $entrega->id_cadastro = $request->cadastrados;
            $entrega->save();
        }

        return redirect()->route('gerenciamento', ['id' => $id])->with('success', 'Movimentação cadastrada com sucesso!');
    }
}
