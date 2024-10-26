@extends('layouts.app')

@section('title', 'Agendamentos')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-red-600 mb-4">Meus Agendamentos</h1>

        @if ($agendamentos->isEmpty())
            <div class="bg-yellow-500 text-white p-4 rounded-md mb-4">
                Você não tem nenhum agendamento.
            </div>
        @else
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Nome Completo</th>
                        <th class="py-2 px-4 border-b">Telefone</th>
                        <th class="py-2 px-4 border-b">Data do Agendamento</th>
                        <th class="py-2 px-4 border-b">Tipo Sanguíneo</th>
                        <th class="py-2 px-4 border-b">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agendamentos as $agendamento)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $agendamento->nome }}</td>
                            <td class="py-2 px-4 border-b">{{ $agendamento->telefone }}</td>
                            <td class="py-2 px-4 border-b">
                                {{ \Carbon\Carbon::parse($agendamento->data_agendamento)->format('d/m/Y') }}</td>
                            <td class="py-2 px-4 border-b">{{ $agendamento->tipos }}</td>
                            <td class="py-2 px-4 border-b">
                                <button onclick="openModal({{ $agendamento }})"
                                    class="bg-yellow-400 hover:bg-yellow-300 text-white font-bold py-2 px-4 rounded">
                                    Editar
                                </button>

                                <form action="{{ route('agendamentos.destroy', $agendamento->id) }}" method="POST"
                                    onsubmit="return confirm('Tem certeza que deseja excluir este agendamento?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Excluir</button>
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
            <form id="editForm" method="POST" action="{{ route('editar_agendamentos', ['id' => 0]) }}">
                @csrf
                @method('PUT')
                <x-input name="nome" displayName="Nome Completo" id="editNome" :value="$agendamentos->first()->nome" />
                <x-input name="telefone" displayName="Telefone" id="editTelefone" :value="$agendamentos->first()->telefone" />
                <x-input name="data_agendamento" type="date" displayName="Data do Agendamento" id="editData"
                    :value="$agendamentos->first()->data_hora_agendamento" />
                <x-select name="tipos" :data="$tipos" displayName="Tipo Sanguíneo" id="editTipo" :value="$agendamentos->first()->id_tipo_sanguineo" />

                <div class="flex justify-end">
                    <button type="button" onclick="closeModal()"
                        class="bg-gray-400 text-white px-4 py-2 rounded mr-2">Cancelar</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Salvar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(agendamento) {
            const dataOriginal = agendamento.data_hora_agendamento;
            const dataISO = dataOriginal.replace(' ', 'T').slice(0, 16);
            const editNome = document.querySelector('#editNome input') || document.getElementById('editNome');
            const editTelefone = document.querySelector('#editTelefone input') || document.getElementById('editTelefone');
            const editData = document.querySelector('#editData input') || document.getElementById('editData');
            const editTipo = document.querySelector('#editTipo select') || document.getElementById('editTipo');

            document.getElementById('editForm').action = '/agendamentos/' + agendamento.id;

            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>
@endsection
