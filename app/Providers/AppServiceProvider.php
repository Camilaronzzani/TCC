<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::resourceVerbs([
            'create' => 'cadastrar',
            'store' => 'salvar',
            'show' => 'visualizar',
            'edit' => 'editar',
            'update' => 'atualizar',
            'destroy' => 'deletar',
        ]);
    }
}
