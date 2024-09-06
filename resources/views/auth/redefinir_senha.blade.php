@extends('layouts.app')
@section('title', 'Redefinir Senha')
@section('content')
    <div class="max-w-md mx-auto bg-white p-10 rounded-lg shadow-lg m-14 ">
        <div class="mb-4 text-sm font-semibold">
            {{ 'Informe seu endereço de e-mail e enviaremos um link para redefinir sua senha.' }}
        </div>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('salvar_restaurar_senha') }}">
            @csrf
            <div class="mb-4">
                <x-input id="email" type="email" name="email" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-6">
                <x-primary-button id="alterar_dados">Redefinir Senha</x-primary-button>
            </div>
        </form>
    </div>
@endsection
