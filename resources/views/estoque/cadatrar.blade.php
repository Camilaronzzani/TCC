<!-- modal-movimentacao.blade.php -->
<div id="modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <!-- Modal content -->
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Ícone -->
                        <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Nova Movimentação</h3>
                        <div class="mt-2">
                            <form action="{{ route('estoque.sangue.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tipo_sangue">
                                        Tipo de Sangue
                                    </label>
                                    <input type="text" name="tipo_sangue" id="tipo_sangue" placeholder="Tipo de Sangue (A+, O-, etc)" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="quantidade">
                                        Quantidade (ml)
                                    </label>
                                    <input type="number" name="quantidade" id="quantidade" placeholder="Quantidade em ml" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="acao">
                                        Ação
                                    </label>
                                    <select name="acao" id="acao" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="entrada">Entrada</option>
                                        <option value="saida">Saída</option>
                                    </select>
                                </div>

                                <div class="flex items-center justify-between">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        Cadastrar
                                    </button>
                                    <button type="button" onclick="closeModal()" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        Fechar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
