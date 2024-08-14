@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-4xl font-bold text-center text-red-600">Bem-vindo ao seu Painel</h1>
    @if(Auth::check())
        <p class="text-center text-lg mt-4 text-gray-700">Olá, {{ Auth::user()->name }}! Você está logado.</p>
    @else
        <p class="text-center text-lg mt-4 text-gray-700">Você não está logado. <a href="{{ route('login') }}" class="text-red-600">Login</a></p>
    @endif
</div>
@endsection