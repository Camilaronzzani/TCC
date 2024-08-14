@extends('layouts.app')
@section('title', 'Home')
@section('content')

    {{-- slide --}}
    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Wrapper for slides -->
        <div class="relative overflow-hidden rounded-lg md:h-96">
            <!-- Slide 1 -->
            <div class="duration-700 ease-in-out" data-carousel-item>
                <img src="img/Prancheta_3.jpg"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/3  top-1/2 left-1/2" alt="Slide 1" />
            </div>
            <!-- Slide 2 -->
            <div class="duration-700 ease-in-out" data-carousel-item>
                <img src="img/tcc.jpeg" class="absolute block w-full -translate-x-1/2 -translate-y-1/3  top-1/4  left-1/2"
                    alt="Slide 2" />
            </div>
        </div>

        <!-- Controls -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
        </div>

        <!-- Previous button -->
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>

        <!-- Next button -->
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    {{-- quem somos --}}
    <section class="grid place-items-center">
        <div class="block max-w p-7 m-2 rounded-lg">
            <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-red-600 dark:text-white">Quem Somos</h5>
            <p class="font-bold">
                Somos uma plataforma dedicada a promover a doação de sangue e a salvar vidas. Nosso
                objetivo é fornecer informações precisas e acessíveis para todos que desejam doar sangue e contribuir
                para a saúde da comunidade. Com uma equipe comprometida de profissionais de saúde e voluntários,
                trabalhamos incansavelmente para conectar doadores a centros de doação, educar sobre a importância da
                doação de sangue e apoiar todos os aspectos deste gesto altruísta. Junte-se a nós e faça a diferença na
                vida de muitos!
            </p>
        </div>
    </section>

    {{-- cards --}}
    <section class="py-10">
        <div class="container mx-auto px-4">
            <div class="flex justify-center">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
                    <a href="{{ route('pode_doar') }}"
                        class="border shadow-lg p-8 text-center hover:bg-gray-100 transition duration-300">
                        <img src="{{ asset('img/gota.png') }}" alt="Quem Pode Doar" class="w-12 h-12 mx-auto mb-4" />
                        <h3 class="text-xl font-semibold mb-2">Quem Pode Doar</h3>
                        <p class="text-gray-700">Saiba quem pode se tornar um doador de sangue e quais são os requisitos.
                        </p>
                    </a>
                    <a href="{{ route('login.index') }}"
                        class="border border-gray-300 rounded-lg shadow-lg p-8 text-center hover:bg-gray-100 transition duration-300">
                        <img src="{{ asset('img/duvida.png') }}" alt="Perguntas Frequentes"
                            class="w-12 h-12 mx-auto mb-4" />
                        <h3 class="text-xl font-semibold mb-2">Perguntas Frequentes</h3>
                        <p class="text-gray-700">Respostas para as perguntas mais comuns sobre doação de sangue.</p>
                    </a>
                    <a href="{{ route('login.index') }}"
                        class="border border-gray-300 rounded-lg shadow-lg p-8 text-center hover:bg-gray-100 transition duration-300">
                        <img src="{{ asset('img/calendario.png') }}" alt="Agendar" class="w-16 h-16 mx-auto mb-4" />
                        <h3 class="text-xl font-semibold mb-2">Agendar</h3>
                        <p class="text-gray-700">Marque seu horário para uma doação de sangue de forma simples e rápida.</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- estoque --}}
    <section class="relative w-full">
        <div class="relative">
            <img src="{{ asset('img/banco.jpeg') }}" alt="Estoque Banco" />
            <div class="absolute inset-0 flex justify-end items-end">
                <ul class="grid grid-cols-4 md:grid-cols-8 mr-10 rounded-lg p-4">
                    <li class="flex flex-col items-center text-center p-4 rounded">
                        <span class="font-bold text-xl text-white">A-</span>
                        <img alt="Crítico" src="{{ asset('img/Crítico.png') }}" class="w-9 h-12 my-4" />
                        <span class="text-lg text-white">Crítico</span>
                    </li>
                    <li class="flex flex-col items-center text-center p-4 rounded">
                        <span class="font-bold text-xl text-white">A+</span>
                        <img alt="Estável" src="{{ asset('img/Estável.png') }}" class="w-9 h-12 my-4" />
                        <span class="text-lg text-white">Estável</span>
                    </li>
                    <li class="flex flex-col items-center text-center p-4 rounded">
                        <span class="font-bold text-xl text-white">B-</span>
                        <img alt="Alerta" src="{{ asset('img/Alerta.png') }}" class="w-9 h-12 my-4" />
                        <span class="text-lg text-white">Alerta</span>
                    </li>
                    <li class="flex flex-col items-center text-center p-4 rounded">
                        <span class="font-bold text-xl text-white">B+</span>
                        <img alt="Estável" src="{{ asset('img/Estável.png') }}" class="w-9 h-12 my-4" />
                        <span class="text-lg text-white">Estável</span>
                    </li>
                    <li class="flex flex-col items-center text-center p-4 rounded">
                        <span class="font-bold text-xl text-white">AB-</span>
                        <img alt="Alerta" src="{{ asset('img/Alerta.png') }}" class="w-9 h-12 my-4" />
                        <span class="text-lg text-white">Alerta</span>
                    </li>
                    <li class="flex flex-col items-center text-center p-4 rounded">
                        <span class="font-bold text-xl text-white">AB+</span>
                        <img alt="Alerta" src="{{ asset('img/Alerta.png') }}" class="w-9 h-12 my-4" />
                        <span class="text-lg text-white">Alerta</span>
                    </li>
                    <li class="flex flex-col items-center text-center p-4 rounded">
                        <span class="font-bold text-xl text-white">O-</span>
                        <img alt="Crítico" src="{{ asset('img/Crítico.png') }}" class="w-9 h-12 my-4" />
                        <span class="text-lg text-white">Crítico</span>
                    </li>
                    <li class="flex flex-col items-center text-center p-4 rounded">
                        <span class="font-bold text-xl text-white">O+</span>
                        <img alt="Estável" src="{{ asset('img/Estável.png') }}" class="w-9 h-12 my-4" />
                        <span class="text-lg text-white">Estável</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    {{-- duvidas --}}
    <h2 class="text-3xl font-bold text-center text-red-600 mb-8 mt-10 relative">
        Dúvidas Frequentes
        <span class="absolute left-1/2 transform -translate-x-1/2 bottom-0 w-80 h-1 bg-red-600"></span>
    </h2>
    <div class="space-y-4 max-w-4xl mx-auto mb-5">
        @foreach ($perguntas as $index => $item)
            <div
                class="bg-gradient-to-r from-white to-gray-100 p-6 rounded-lg shadow-md transition-shadow duration-300 hover:shadow-lg">
                <button class="w-full text-left flex items-center justify-between focus:outline-none" data-toggle-answer
                    data-answer-id="answer-{{ $index }}" data-icon-id="icon-{{ $index }}">
                    <h3 class="text-2xl font-semibold text-red-600">{{ $item['question'] }}</h3>
                    <svg class="w-6 h-6 transform transition-transform duration-300" id="icon-{{ $index }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <p id="answer-{{ $index }}" class="mt-3 text-gray-700 hidden transition-all duration-300">
                    {{ $item['answer'] }}
                </p>
            </div>
        @endforeach
    </div>

    {{-- img --}}
    <section class="relative w-full">
        <div class="relative">
            <img src="{{ asset('img/parte2.jpeg') }}" alt="Estoque Banco" />
        </div>
    </section>

    @if (Auth::check())
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
    @endif
@endsection
@section('scripts')
    <script>
        document.querySelectorAll('[data-toggle-answer]').forEach(button => {
            button.addEventListener('click', function() {
                const answerId = this.getAttribute('data-answer-id');
                const iconId = this.getAttribute('data-icon-id');

                const answer = document.getElementById(answerId);
                const icon = document.getElementById(iconId);

                answer.classList.toggle('hidden');

                icon.classList.toggle('transform');
                icon.classList.toggle('rotate-180');
            });
        });
    </script>
@endsection
