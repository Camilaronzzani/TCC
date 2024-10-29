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
                estoque_sangues_entradas.id_usuario as usuario, 
                estoque_sangues_entradas.created_at, 
                'Entrada' as tipo, 
                nome, 
                id_tipo_sanguineo")
            ->join('users', 'users.id', 'estoque_sangues_entradas.id_usuario')
            ->join('estoque_sangues', 'estoque_sangues.id', 'id_estoque')
            ->where('id_tipo_sanguineo', $id);

        $saidas = EstoqueSaidas::selectRaw("
                id_estoque, 
                quantidade, 
                estoque_sangues_saidas.id_usuario as usuario, 
                estoque_sangues_saidas.created_at, 
                'Saída' as tipo, 
                id_tipo_sanguineo,
                nome")
            ->join('users', 'users.id','estoque_sangues_saidas.id_usuario')
            ->join('estoque_sangues', 'estoque_sangues.id', 'id_estoque')
            ->where('id_tipo_sanguineo', $id);

        $linhas = $saidas->union($entradas)->get();

        $return = [
            'total' => $linhas->sum('quantidade'),
            'registros' => $linhas,
            'id' => TipoSanguineo::findOrFail($id),
            'cadastrados' => Cadastro::pluck('nome', 'id'),
        ];

        return view('estoque.gerenciamento', $return);
    }

    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tipo' => 'required',
            'cadastrados' => 'required',
            'quantidade' => [
                'required',
                'min:0',
                'numeric',
                function ($quantidade_saida, $value, $fail) use ($request) {
                    if ($request->tipo == 2) {
                        $estoque = EstoqueSangues::findOrFail($request->id);
                        if ($value > $estoque->quantidade_atual) {
                            $fail('Quantidade de saída indisponível no estoque!');
                        }
                    }
                },
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
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

            return redirect()->route('gerenciamento', ['id' => $id]);
        }
    }
}
