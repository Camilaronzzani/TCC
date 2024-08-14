@extends('layouts.app')
@section('title', 'Redefinir Senha')
@section('content')
    <div class="max-w-md mx-auto bg-white p-10 rounded-lg shadow-lg mt-10">
        <div class="mb-4 text-sm ">
            {{ 'Esqueceu sua senha? Sem problemas. Informe seu endereço de e-mail e enviaremos um link para redefinir sua senha.' }}
        </div>
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('salvar_restaurar_senha') }}">
            @csrf

            <div class="mb-4">
                <x-input id="email" type="email" name="email" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-6">
                <button type="submit"
                    class="w-full bg-red-600 text-white py-3 px-4 rounded-md hover:bg-red-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-red-200 focus:ring-opacity-50">
                    Redefinir Senha
                </button>
            </div>
        </form>
    </div>
@endsection
