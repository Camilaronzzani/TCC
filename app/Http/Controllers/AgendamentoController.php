<?php

namespace App\Http\Controllers;

use App\Models\AgendamentoDoacao;
use App\Models\Cadastro;
use App\Models\TipoSanguineo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AgendamentoController extends Controller
{

    public function index()
    {
        $return = [
            'agendamentos' => AgendamentoDoacao::join('cadastros', 'agendamentos_doacoes.id_cadastros', '=', 'cadastros.id')
                ->join('tipos_sanguineos', 'cadastros.id_tipo_sanguineo', '=', 'tipos_sanguineos.id')
                ->where('id_cadastros', Auth::user()->cadastro->first()->id)->get(),
            'tipos' => TipoSanguineo::pluck('tipos', 'id'),
        ];
        return view('agendamentos.index', $return);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome_completo' => 'required|string|max:255',
            'telefone' => 'required|numeric',
            'data_agendamento' => 'required|date',
            'data_nascimento' => 'required|date',
            'tipo_sanguineo' => 'required|string',
            'cep' => 'required|numeric',
            'endereco' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $id = Cadastro::where('id_usuario', Auth::user()->cadastro->first()->id_usuario)->get();
            $cadastro = Cadastro::findOrFail($id->first()->id);
            $cadastro->nome = $request->nome_completo;
            $cadastro->telefone = $request->telefone;
            $cadastro->id_tipo_sanguineo = $request->tipo_sanguineo;
            $cadastro->data_nascimento = $request->data_nascimento;
            $cadastro->cep = $request->cep;
            $cadastro->endereco = $request->endereco;
            $cadastro->cidade = $request->cidade;
            $cadastro->estado = $request->estado;
            $cadastro->save();

            $agenda = new AgendamentoDoacao();
            $agenda->id_cadastros = $cadastro->id;
            $agenda->data_hora_agendamento = $request->data_agendamento;
            $agenda->save();

            return redirect()->route('agendamentos')->with('success', 'Agendamento realizado com sucesso!');
        }
    }

    public function destroy($id)
    {
        $agendamento = AgendamentoDoacao::findOrFail($id);
    
        if ($agendamento) {
            $agendamento->delete();
            return redirect()->route('agendamentos')->with('success', 'Agendamento excluído com sucesso.');
        } else {
            return redirect()->route('agendamentos')->with('error', 'Agendamento não encontrado.');
        }
    }
    

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome_completo' => 'required|string|max:255',
            'telefone' => 'required|numeric',
            'data_agendamento' => 'required|date',
            'tipo_sanguineo' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // $agendamento = AgendamentoDoacao::findOrFail($id);
        // $agendamento->data_hora_agendamento = $request->data_agendamento;
        // $agendamento->save();

        $cadastro = Cadastro::where('id_usuario', Auth::user()->id)->first();
        if ($cadastro) {
            $cadastro->nome = $request->nome_completo;
            $cadastro->telefone = $request->telefone;
            $cadastro->id_tipo_sanguineo = $request->tipo_sanguineo;
            $cadastro->update();
        } else {
            return redirect()->back()->with('error', 'Cadastro não encontrado.');
        }

        return redirect()->route('agendamentos')->with('success', 'Agendamento atualizado com sucesso!');
    }
}
