<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->senha])) {
            $user = Auth::user();
            $user->token_2fa_validade = Carbon::now();
            $user->save();

            return redirect()->route('home_auth');
        } else {
            $validator->after(function ($validator) {
                $validator->errors()->add(
                    'login',
                    'Credenciais inválidas'
                );
            });
        }
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // return redirect()->route('login.index')->error();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
