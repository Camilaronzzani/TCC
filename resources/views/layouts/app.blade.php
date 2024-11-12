<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Conexão Sanguínea', 'Conexão Sanguínea') }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="icon" href="{{ asset('img/logo.png') }}">
</head>

<body>
    <header class="fixed w-full bg-white shadow-md z-20">
        <nav class="container mx-auto px-4 py-4 flex flex-wrap items-center">
            <a href="{{ url('/') }}" class="flex items-center text-xl font-bold text-red-600">
                <img src="{{ asset('img/logo2.png') }}" alt="Logo" class="w-28 h-12 object-contain" />
            </a>

            <div class="flex flex-1 items-center justify-start space-x-6 mt-4 lg:mt-0 ml-16">
                <a href="{{ route('instituicao') }}" class="text-gray-700 hover:text-red-600 transition duration-300">
                    Instituições
                </a>

                @if (Auth::check())
                    <a href="{{ route('agendamentos') }}"
                        class="text-gray-700 hover:text-red-600 transition duration-300">
                        Agendamentos
                    </a>
                    @if (Auth::user()->id == 1)
                        <a href="/estoque" class="text-gray-700 hover:text-red-600 transition duration-300">
                            Estoque
                        </a>
                    @endif
                @endif

                <a href="{{ route('pode_doar') }}" class="text-gray-700 hover:text-red-600 transition duration-300">
                    Quem Pode Doar
                </a>
            </div>

            @if (Auth::check())
                <div class="relative inline-block text-left ml-6">
                    <button type="button"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 border border-red-600 rounded-lg shadow-md transition duration-300"
                        id="dropdownButton">
                        Olá, {{ Auth::user()->nome }}
                    </button>
                    <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-lg z-10 hidden"
                        id="dropdownMenu">
                        <div class="py-1">
                            <a href="{{ route('alterar_dados') }}"
                                class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 hover:text-gray-900">
                                Alterar Dados
                            </a>
                            <a href="{{ route('logout') }}"
                                class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 hover:text-gray-900">
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <a href="{{ route('cadastro.index') }}"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 border border-red-600 rounded-lg shadow-md transition duration-300">
                    Cadastrar-se
                </a>
            @endif
        </nav>
    </header>

    <!-- Conteúdo Principal -->
    <div class="pt-16">
        @yield('content')
    </div>

    <!-- Rodapé -->
    <footer class="grid grid-cols-3 gap-4 content-betwee bg-gray-100">
        <div class="pt-10 ml-10">
            <h2 class="text-2xl font-bold ">Contato</h2>
            <p class="text-gray-700 mb-6">
                (00) 00000-0000
                <br>
                Contato@email.com
                <br>
                SAC
            </p>
        </div>
        <div class="pt-10">
            <h2 class="text-2xl font-bold ">Desenvolvimento</h2>
            <p class="text-gray-700 mb-6">
                Camila Luiza
                <br>
                João Vitor Bispo
                <br>
                Kathirry Fabricia
            </p>
        </div>
        <div class="pt-10 ml-20">
            <div class="grid grid-cols-3 gap-3 content-betwee bg-gray-100">
                <img src="{{ asset('img/instagram.png') }}" class="w-10 h-10" />
                <img src="{{ asset('img/facebook.png') }}" class="w-10 h-10" />
                <img src="{{ asset('img/whatsapp.png') }}" class="w-10 h-10" />
            </div>
            <div class="">
                <img src="{{ asset('img/logo2.png') }}" alt="Logo" class="w-28 h-12 object-contain" />
            </div>
        </div>
    </footer>
    @vite('resources/js/app.js')
    @if (Auth::check())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var botao = document.getElementById('dropdownButton');
                var menu = document.getElementById('dropdownMenu');

                botao.addEventListener('click', function() {
                    menu.classList.toggle('hidden');
                });

                document.addEventListener('click', function(event) {
                    if (!botao.contains(event.target) && !menu.contains(event.target)) {
                        menu.classList.add('hidden');
                    }
                });
            });
        </script>
    @endif
    @yield('scripts')
</body>

</html>
