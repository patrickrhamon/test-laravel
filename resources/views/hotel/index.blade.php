@extends('template')
@section('body')
    <div class="bg-white p-8 rounded shadow-md w-full h-screen">
        <h1 class="text-2xl font-semibold mb-4">Hoteis Cadastrados</h1>
        <a href="{{ route('hotel.create') }}"
            class="inline-block bg-blue-500 text-white text-2xl px-4 py-4 rounded">Novo</a>

        <div class="grid grid-cols-1 gap-8">
            <div>
            @foreach($hotels as $hotel)
                <div class="bg-light p-6 rounded-lg shadow-md flex flex-col items-center gap-4">
                    <div class="col-span-2"><h2 class="text-xl font-semibold mb-4">{{ $hotel->name }}</h2></div>
                    <div class="flex-grow"></div>
                    <div class="space-x-4">
                        <a href="{{ route('hotel.show', [$hotel->id]) }}"
                           class="inline-block bg-blue-500 text-white px-4 py-2 rounded">Mostrar</a>
                        <a href="{{ route('hotel.edit', [$hotel->id]) }}"
                           class="inline-block bg-blue-500 text-white px-4 py-2 rounded">Editar</a>
                        <a href="{{ route('room.index', [$hotel->id]) }}"
                           class="inline-block bg-blue-500 text-white px-4 py-2 rounded">Quartos</a>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection


