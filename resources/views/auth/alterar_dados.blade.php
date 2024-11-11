@extends('layouts.app')
@section('title', 'Alterar Dados')
@section('content')
    <form method="POST" action="{{ route('salvar_alterar_dados') }}" id="alterar-form"
        class="p-8 bg-white rounded-lg shadow-lg max-w-md mx-auto mt-10 m-10">
        @csrf
        <h2 class="text-center text-3xl font-bold text-red-600 mb-6">Alterar Dados</h2>

        <x-input-error :messages="$errors->get('update')" class="mt-2" />

        <div class="row">
            <x-input name="nome" id="nome" required placeholder="Seu nome" :value="auth()->user()->nome" />
            <x-input-error :messages="$errors->get('nome')" class="mt-2" />

            <x-input name="email" type="email" id="email" required placeholder="Seu email" :value="auth()->user()->email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <x-input name="senha" type="password" id="password" placeholder="Nova senha (opcional)" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

            <x-input name="confirmar_senha" type="password" id="password_confirmation"
                placeholder="Confirme a senha" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div hidden>
            <x-input name="id" :value="auth()->user()->id" />
        </div>
        <div>
            <x-primary-button id="alterar-button">Alterar Dados</x-primary-button>
        </div>
    </form>
@endsection
