<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CadastroController extends Controller
{
    private $cadastro;

    public function __construct(
        User $cadastro
    ) {
        $this->cadastro = $cadastro;
    }

    public function index()
    {
        return view('cadastro');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'min:6|required_with:confirme_senha|same:confirme_senha',
            'confirme_senha' => 'min:6',
        ], [
            'nome.required' => 'O campo Nome é obrigatório.',
            'email.required' => 'O campo Email é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de email válido.',
            'email.unique' => 'Esse Email já está cadastrado.',
            'senha.required' => 'O campo Senha é obrigatório.',
            'senha.min' => 'A senha deve ter no mínimo 6 caracteres.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $linha = null;

        DB::transaction(function () use ($request, &$linha) {
            $linha = new $this->cadastro;
            $linha->nome = $request->nome;
            $linha->email = $request->email;
            $linha->senha = Hash::make($request->senha);
            $linha->status_login = 1;
            $linha->save();
        });

        Auth::login($linha);
        return redirect()->route('home_auth')->with('success', 'Cadastro realizado com sucesso!');
    }
}
