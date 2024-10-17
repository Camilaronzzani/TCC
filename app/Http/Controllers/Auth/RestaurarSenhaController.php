<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class RestaurarSenhaController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function index()
    {
        return view('auth.redefinir_senha');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }

}
