<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    private $usuario;

    public function __construct(
        User $usuario
        
    ) {
        $this->usuario = $usuario;
    }

    public function alterar_dados()
    {
        return view('auth.alterar_dados');
    }

    public function salvar_alterar_dados(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::transaction(function () use ($request) {
            $linha = $this->usuario->findOrFail($request->id);
            $linha->nome = $request->nome;
            $linha->email = $request->email;
            $linha->senha = Hash::make($request->senha);
            $linha->save();
        });
        
        return redirect()->route('alterar_dados')->with('success', 'Alterar dados com sucesso!');
    }
}
