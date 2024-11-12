@extends('layouts.app')
@section('title', 'Home')
@section('content')

    <div class="relative overflow-hidden rounded-lg md:h-96">
        <img src="img/tcc.jpeg" class="absolute block w-full -translate-x-1/2 -translate-y-1/3 top-1/4 left-1/2"
            alt="Slide 2" />
    </div>

    {{-- quem somos --}}
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

    {{-- cards --}}
    <div class="container mx-auto px-4 mb-3">
        <div class="flex justify-center">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-8">
                <a href="{{ route('pode_doar') }}" class="border shadow-lg p-8 text-center hover:bg-gray-100">
                    <img src="{{ asset('img/gota.png') }}" alt="Quem Pode Doar" class="w-12 h-12 mx-auto mb-4" />
                    <h3 class="text-xl font-semibold mb-2">Quem Pode Doar</h3>
                    <p class="text-gray-700">Saiba quem pode se tornar um doador de sangue e quais são os requisitos.
                    </p>
                </a>

                <a href="{{ route('login.index') }}"
                    class="border border-gray-300 rounded-lg shadow-lg p-8 text-center hover:bg-gray-100">
                    <img src="{{ asset('img/calendario.png') }}" alt="Agendar" class="w-16 h-16 mx-auto mb-4" />
                    <h3 class="text-xl font-semibold mb-2">Agendar</h3>
                    <p class="text-gray-700">Marque seu horário para uma doação de sangue de forma simples e rápida.</p>
                </a>
            </div>
        </div>
    </div>

    {{-- estoque --}}
    <div class="relative">
        <img src="{{ asset('img/banco.jpeg') }}" alt="Estoque Banco" />
        <div class="absolute inset-0 flex justify-end items-end">
            <ul class="grid grid-cols-4 md:grid-cols-8 mr-10 rounded-lg p-4">
                @foreach ($estoques as $estoque)
                    <li class="flex flex-col items-center text-center p-4 rounded">
                        <span class="font-bold text-xl text-white">{{ $estoque->tipos->tipos }}</span>
                        <img alt="{{ $estoque->status }}" src="{{ asset('img/' . $estoque->status . '.png') }}"
                            class="w-9 h-12 my-4" />
                        <span class="text-lg text-white">{{ $estoque->status }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- duvidas --}}
    <h2 class="text-3xl font-bold text-center text-red-600 mb-8 mt-10 relative">
        Dúvidas Frequentes
        <span class="absolute left-1/2 transform -translate-x-1/2 bottom-0 w-80 h-1 bg-red-600"></span>
    </h2>
    <div class="space-y-4 max-w-4xl mx-auto mb-5">
        @foreach ($perguntas as $index => $item)
            <div
                class="bg-gradient-to-r from-white to-gray-100 p-6 rounded-lg shadow-md transition-shadow duration-300 hover:shadow-lg">
                <button class="w-full text-left flex items-center justify-between focus:outline-none" data-toggle-resposta
                    data-resposta-id="resposta-{{ $index }}" data-icon-id="icon-{{ $index }}">
                    <h3 class="text-2xl font-semibold text-red-600">{{ $item['questao'] }}</h3>
                    <svg class="w-6 h-6 transform transition-transform duration-300" id="icon-{{ $index }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <p id="resposta-{{ $index }}" class="mt-3 text-gray-700 hidden transition-all duration-300">
                    {{ $item['resposta'] }}
                </p>
            </div>
        @endforeach
    </div>

    {{-- img --}}
    <div class="relative">
        <img src="{{ asset('img/parte2.jpeg') }}" alt="Estoque Banco" />
    </div>

@endsection
@section('scripts')
    <script>
        document.querySelectorAll('[data-toggle-resposta]').forEach(button => {
            button.addEventListener('click', function() {
                const respostaId = this.getAttribute('data-resposta-id');
                const iconId = this.getAttribute('data-icon-id');

                const resposta = document.getElementById(respostaId);
                const icon = document.getElementById(iconId);

                resposta.classList.toggle('hidden');

                icon.classList.toggle('transform');
                icon.classList.toggle('rotate-180');
            });
        });
    </script>
@endsection
