@extends('layouts.app')
@section('title', 'Alterar Dados')
@section('content')
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg mt-10 mb-5">
        <h2 class="text-2xl font-bold text-center text-red-600">Alterar Dados</h2>
        <form id="alterar-form" class="p-8 bg-white rounded-lg max-w-md mx-auto">
            @csrf
            <div class="mb-6">
                <x-input name="nome" id="nome" required :value="auth()->user()->nome" />
                <x-input-error :messages="$errors->get('nome')" class="mt-2" />

                <x-input name="email" id="email" required :value="auth()->user()->email" type="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                <x-input name="senha" id="senha" type="password" />
                <x-input-error :messages="$errors->get('senha')" class="mt-2" />

                <x-input name="confirme_a_senha" id="confirme_a_senha" type="email" type="password" />
                <x-input-error :messages="$errors->get('confirme_a_senha')" class="mt-2" />
            </div>
            <x-primary-button id="alterar_dados">Alterar Dados</x-primary-button>
        </form>
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('alterar-form');
            const button = document.getElementById('alterar_dados');
            console.log(form, button);

            form.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(form);

                button.disabled = true;
                button.textContent = 'Carregando...';

                const appUrl =
                    '{{ env('APP_URL') }}';

                fetch(appUrl + '/salvar_alterar_dados', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        }
                    })
                    .then(response => {
                        console.log(response)
                        if (!response.ok) {
                            throw new Error('Erro na requisição');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert('Login realizado com sucesso!');
                            window.location.href = '{{ route('salvar_alterar_dados') }}';
                        } else {
                            alert(data.message || 'Erro.');
                        }
                    })
                    .catch(error => {
                        console.log(errors)
                        alert(error);
                    })
                    .finally(() => {
                        button.disabled = false;
                        button.textContent = 'Alterar Dados';
                    });
            });
        });
    </script>
@endsection
