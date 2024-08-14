<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAuthenticated
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login.index')->with('message', 'Você precisa estar logado para acessar esta página.');
        }

        return $next($request);
    }
}
