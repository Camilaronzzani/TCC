@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <form method="POST" action="{{ route('login.store') }}" id="login-form"
        class="p-8 bg-white rounded-lg shadow-lg max-w-md mx-auto mt-10 m-10">
        @csrf
        <h2 class="text-center text-3xl font-bold text-red-600 mb-6">Login</h2>
        <x-input-error :messages="$errors->get('login')" class="mt-2" />

        <div class="mb-6">
            <x-input name="email" type="email" id="email" required placeholder="Seu email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-6">
            <x-input name="senha" type="password" id="senha" required placeholder="Sua senha" />
            <x-input-error :messages="$errors->get('senha')" class="mt-2" />
        </div>

        <div>
            <x-primary-button id="login-button">Login</x-primary-button>
        </div>
    </form>
@endsection
