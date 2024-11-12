@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container mx-auto px-6 py-10">
        <div class="flex flex-col lg:flex-row items-center justify-between bg-white rounded-xl shadow-xl overflow-hidden">
            <div class="w-full lg:w-1/2 bg-gradient-to-br from-red-500 to-red-700 text-white p-8 lg:rounded-l-xl">
                <h1 class="text-5xl font-extrabold mb-4">Bem-vindo ao Conexão Sanguínea</h1>
                <p class="text-lg leading-relaxed">
                    Estamos comprometidos em conectar doadores e receptores de sangue de maneira eficaz e segura.
                    Junte-se a nós e faça a diferença na vida de muitas pessoas.
                </p>
            </div>

            <div class="w-full lg:w-1/2 bg-gray-100 p-10 rounded-lg lg:rounded-r-xl shadow-md">
                <h2 class="text-3xl font-semibold text-red-700 mb-6">Agende Sua Doação</h2>
                <form id="agendamento-form" method="POST" action="{{ route('agendamentos.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-input name="nome_completo" id="nome" required :value="Auth::user()->cadastro->first()->nome ?? Auth::user()->nome"
                                placeholder="Nome Completo" />
                            <x-input-error :messages="$errors->get('nome_completo')" class="mt-2" />
                        </div>
                        <div>
                            <x-input name="telefone" id="telefone" required type="number" placeholder="Telefone"
                                :value="Auth::user()->cadastro->first()->telefone ?? null" />
                            <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
                        </div>
                        <div>
                            <x-input type="date" name="data_agendamento" id="data_agendamento" required
                                placeholder="Data de Agendamento" />
                            <x-input-error :messages="$errors->get('data_agendamento')" class="mt-2" />
                        </div>
                        <div>
                            <x-input type="date" name="data_nascimento" id="data_nascimento" required :value="Auth::user()->cadastro->first()->data_nascimento ?? null"
                                placeholder="Data de Nascimento" />
                            <x-input-error :messages="$errors->get('data_nascimento')" class="mt-2" />
                        </div>
                        <div>
                            <x-select name="tipo_sanguineo" :data="$tipos" placeholder="Tipo Sanguíneo"
                                :value="Auth::user()->cadastro->first()->id_tipo_sanguineo ?? null" />
                            <x-input-error :messages="$errors->get('tipo_sanguineo')" class="mt-2" />
                        </div>
                        <div>
                            <x-input name="cep" id="cep" required type="number" placeholder="CEP"
                                :value="Auth::user()->cadastro->first()->cep ?? null" />
                            <x-input-error :messages="$errors->get('cep')" class="mt-2" />
                        </div>
                        <div>
                            <x-input name="endereco" id="endereco" required placeholder="Endereço" :value="Auth::user()->cadastro->first()->endereco ?? null" />
                            <x-input-error :messages="$errors->get('endereco')" class="mt-2" />
                        </div>
                        <div>
                            <x-input name="cidade" id="cidade" required placeholder="Cidade" :value="Auth::user()->cadastro->first()->cidade ?? null" />
                            <x-input-error :messages="$errors->get('cidade')" class="mt-2" />
                        </div>
                        <div>
                            <x-input name="estado" id="estado" required :value="'PR'" placeholder="Estado"
                                :value="Auth::user()->cadastro->first()->estado ?? null" />
                            <x-input-error :messages="$errors->get('estado')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <x-primary-button id="agendamento-form">Agendar Doação</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
