@extends('layouts.app')

@section('title', 'Agendamentos')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl text-center font-semibold mb-3 mt-5 relative">
            Meus Agendamentos
            <span class="absolute left-1/2 transform -translate-x-1/2 bottom-0 w-80 h-1 bg-red-600"></span>
        </h2>

        @if ($agendamentos->isEmpty())
            <div class="bg-yellow-500 text-white p-4 rounded-md mb-4 text-center">
                Você não tem nenhum agendamento.
            </div>
        @else
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg mt-4">
                <thead>
                    <tr>
                        <th class="py-3 px-4 border-b text-left">Nome Completo</th>
                        <th class="py-3 px-4 border-b text-left">Telefone</th>
                        <th class="py-3 px-4 border-b text-left">Data do Agendamento</th>
                        <th class="py-3 px-4 border-b text-left">Tipo Sanguíneo</th>
                        <th class="py-3 px-4 border-b text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agendamentos as $agendamento)
                        <tr>
                            <td class="py-3 px-4 border-b">{{ $agendamento->nome }}</td>
                            <td class="py-3 px-4 border-b">{{ $agendamento->telefone }}</td>
                            <td class="py-3 px-4 border-b">
                                {{ \Carbon\Carbon::parse($agendamento->data_agendamento)->format('d/m/Y') }}
                            </td>
                            <td class="py-3 px-4 border-b">{{ $agendamento->tipos }}</td>
                            <td class="py-3 px-4 border-b text-center space-x-2">
                                <button onclick="openModal({{ $agendamento }})"
                                    class="bg-yellow-400 hover:bg-yellow-300 text-white font-bold py-2 px-4 rounded">
                                    Editar
                                </button>

                                <form action="{{ route('agendamentos.destroy', $agendamento->id) }}" method="POST"
                                    onsubmit="return confirm('Tem certeza que deseja excluir este agendamento?');"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div id="editModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="text-xl font-bold mb-4">Editar Agendamento</h2>
            <form id="editForm" method="POST" action="">
                @csrf
                @method('PUT')
                <x-input name="nome" displayName="Nome Completo" id="editNome" />
                <x-input name="telefone" displayName="Telefone" id="editTelefone" />
                <x-input name="data_agendamento" type="date" displayName="Data do Agendamento" id="editData" />
                <x-select name="tipos" :data="$tipos" displayName="Tipo Sanguíneo" id="editTipo" />

                <div class="flex justify-end mt-4">
                    <button type="button" onclick="closeModal()"
                        class="bg-gray-400 text-white px-4 py-2 rounded mr-2">Cancelar</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Salvar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(agendamento) {
            const editForm = document.getElementById('editForm');
            editForm.action = `/agendamentos/${agendamento.id}`;
            document.getElementById('editNome').value = agendamento.nome;
            document.getElementById('editTelefone').value = agendamento.telefone;
            document.getElementById('editData').value = agendamento.data_agendamento;
            document.getElementById('editTipo').value = agendamento.id_tipo_sanguineo;
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>
@endsection
