@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <div class="flex items-center justify-center">
        <form method="POST" action="{{ route('cadastro.store') }}" class="bg-white p-5 rounded-lg w-full max-w-md">
            @csrf
            <h2 class="text-center text-3xl font-bold text-red-600 mb-6">Cadastro</h2>

            <div class="row">
                <x-input name="nome" id="nome" required />
                <x-input-error :messages="$errors->get('nome')" class="mt-2" />

                <x-input name="email" type="email" id="email" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                <x-input name="senha" id="senha" type="password" required />
                <x-input-error :messages="$errors->get('senha')" class="mt-2" />

                <x-input name="confirme_senha" displayName="Confirme a Senha" id="confirme_senha" required
                    type="password" />
                <x-input-error :messages="$errors->get('confirme_senha')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('login.index') }}">
                    {{ 'Já possui uma conta?' }}
                </a>

                <x-primary-button>
                    {{ 'Cadastrar' }}
                </x-primary-button>
            </div>
        </form>
    </div>
@endsection
