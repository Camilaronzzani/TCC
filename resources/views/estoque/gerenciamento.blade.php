@extends('layouts.app')
@section('title', 'Estoque Movimentações')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl text-center font-semibold mb-8 relative text-gray-800">
            Movimentação Tipo: {{ $id->tipos }}
            <span class="absolute left-1/2 transform -translate-x-1/2 bottom-0 w-80 h-1 bg-red-600"></span>
        </h2>
        <div class="text-left mb-4">
            <p class="text-lg font-semibold text-gray-700">
                Total Quantidade: {{ $total }} /1000
            </p>
        
        <div class="flex justify-end mb-6">
            <button id="openModalButton"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-300 mr-3">
                Cadastrar Movimentação
            </button>
            <a href="/estoque" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-300">
                Voltar
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow-lg rounded-lg border border-gray-200">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100 border-b-2 border-gray-200">
                    <tr>
                        <th class="text-left py-3 px-4 text-gray-700 font-semibold">Doadores/Receptores</th>
                        <th class="text-left py-3 px-4 text-gray-700 font-semibold">Quantidade (ml)</th>
                        <th class="text-left py-3 px-4 text-gray-700 font-semibold">Tipo</th>
                        <th class="text-left py-3 px-4 text-gray-700 font-semibold">Data</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($registros as $registro)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4 text-gray-900">{{ $registro->nome }}</td>
                            <td class="py-3 px-4 text-gray-900">{{ $registro->quantidade }}</td>
                            <td class="py-3 px-4 text-gray-900">{{ $registro->tipo }}</td>
                            <td class="py-3 px-4 text-gray-900">{{ $registro->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-3 px-4 text-center text-gray-500">Nenhuma movimentação registrada.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div id="modal" class="fixed z-50 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>

            <div class="bg-white rounded-lg shadow-2xl transform transition-all sm:max-w-lg sm:w-full">
                <div class="px-8 py-6 bg-white rounded-lg">
                    <h3 class="text-xl font-semibold text-gray-900  text-center">
                        Nova Movimentação
                    </h3>

                    <form action="{{ route('store', ['id' => $id]) }}" method="POST">
                        @csrf

                        <x-input name="quantidade" DisplayName="Quantidade (ml)" id="quantidade" type="number" />
                        @error('quantidade')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                        <x-select name="tipo" id="tipo" :data="['1' => 'Entrada', '2' => 'Saída']" />
                        @error('tipo')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror

                        <x-select name="cadastrados" id="cadastrados" displayName="Por/Para Quem" :data="$cadastrados" />
                        @error('cadastrados')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror

                        <div class="flex justify-between items-center">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg shadow-md focus:outline-none focus:ring-4 focus:ring-blue-300 transition-transform transform hover:scale-105">
                                Cadastrar
                            </button>
                            <button type="button" id="closeModalButton"
                                class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded-lg shadow-md focus:outline-none focus:ring-4 focus:ring-red-300 transition-transform transform hover:scale-105">
                                Fechar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="bg-green-500 text-white text-center p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif
    <script>
        const openModalButton = document.getElementById('openModalButton');
        const closeModalButton = document.getElementById('closeModalButton');
        const modal = document.getElementById('modal');

        openModalButton.addEventListener('click', function() {
            modal.classList.remove('hidden');
        });

        closeModalButton.addEventListener('click', function() {
            modal.classList.add('hidden');
        });

        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        });
    </script>
@endsection
