@extends('layouts.app')
@section('title', 'Estoque')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl text-center font-semibold mb-3 mt-5 relative">
            Estoque
            <span class="absolute left-1/2 transform -translate-x-1/2 bottom-0 w-80 h-1 bg-red-600"></span>
        </h2>
        <div class="grid grid-cols-4 gap-4">
            @foreach ($estoque as $index => $estoques)
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg">
                    <h5 class="mb-2 text-4xl font-bold tracking-tight text-red-600">{{ $estoques->tipos }}</h5>
                    <a href="{{ url('estoque/' . $estoques->id . '/gerenciamento') }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        Visualizar Estoque
                    </a>
                </div>
            @endforeach
        </div>        
    </div>
@endsection
