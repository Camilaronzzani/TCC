@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container mx-auto px-4 py-8 p-10">
        <div class="flex flex-col lg:flex-row items-center justify-between bg-white rounded-lg shadow-lg p-8">
            <div class="w-full lg:w-1/2 mb-8 lg:mb-0">
                <h1 class="text-4xl font-bold text-red-600 mb-4">Bem-vindo ao Sistema Conexão Sanguínea</h1>
                <p class="text-gray-700 leading-relaxed">
                    Estamos comprometidos em conectar doadores e receptores de sangue de maneira eficaz e segura.
                    Junte-se a nós e faça a diferença na vida de muitas pessoas.
                </p>
            </div>
            <div class="w-full lg:w-1/2 bg-gray-100 rounded-lg p-6 shadow-md">
                <h2 class="text-2xl font-semibold text-red-600 mb-4">Agende Sua Doação</h2>
                <form id="agendamento-form" method="POST" action="{{ route('agendamentos') }}">
                    @csrf
                    <div class="mb-4">
                        <x-input name="nome_completo" id="nome" required :value="Auth::user()->nome" />
                        <x-input-error :messages="$errors->get('nome_completo')" class="mt-2" />

                        <x-input name="telefone" id="telefone" required type="number" />
                        <x-input-error :messages="$errors->get('telefone')" class="mt-2" />

                        <x-input type="date" name="data_agendamento" id="data_agendamento" required />
                        <x-input-error :messages="$errors->get('data_agendamento')" class="mt-2" />

                        <x-input type="date" name="data_nascimento" id="data_nascimento" required />
                        <x-input-error :messages="$errors->get('data_nascimento')" class="mt-2" />

                        <x-select name="tipo_sanguineo" :data="$tipos" />
                        <x-input-error :messages="$errors->get('tipo_sanguineo')" class="mt-2" />

                        <x-input name="cep" id="cep" required type="number" />
                        <x-input-error :messages="$errors->get('cep')" class="mt-2" />

                        <x-input name="endereco" id="endereco" required />
                        <x-input-error :messages="$errors->get('endereco')" class="mt-2" />

                        <x-input name="cidade" id="cidade" required />
                        <x-input-error :messages="$errors->get('cidade')" class="mt-2" />

                        <x-input name="estado" id="estado" required :value="'PR'" />
                        <x-input-error :messages="$errors->get('estado')" class="mt-2" />
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-red-200 focus:ring-opacity-50">
                            Agendar Doação
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
