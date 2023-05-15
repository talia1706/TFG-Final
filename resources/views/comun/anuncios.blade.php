@extends('plantilla')
@section('titulo', 'Anuncios')
@section('contenido')
{{-- Mostramos los animales siempre que los haya, y añadimos un enlace
    a cada anuncio para que se pueda ver la información de cada uno --}}
<div class="relative overflow-x-auto sm:rounded-lg">
    <p class="text-center text-2xl pt-10 font-semibold">Mostrando los datos de los anuncios existentes</p>
    <div class="columns_menu place-items-center">
    @forelse ($anuncios_totales as $anuncio)
                <div class="max-w-sm rounded mt-10 m-2 border-2 border-zinc-100 m-4 p-4">
                <a href="{{route('comun.mostrar_anuncio_id', $anuncio->id)}}">
                    <div class="flex w-full items-center justify-center" id="div_imagen_animal">
                    <img class="mx-auto" id="imagen_perfil_animal" src='{{$anuncio->imagen_perfil}}' alt="Foto portada">
                    </div>
                    <div class="px-6 mb-4 text-center">
                        <div class="font-bold text-xl mb-2">{{$anuncio->nombre}}</div>
                        <p class="text-gray-700 text-base mb-2">
                        {{$anuncio->provincia}}
                        </p>
                        @if ($anuncio->urgente=="si")
                        <p class="text-black-700 text-base bg-red-500 rounded font-bold p-2 xl:p-9">
                            ADOPCIÓN URGENTE
                            </p>
                        @else
                        <p class="text-black-700 text-base bg-green-500 rounded font-bold p-2">
                            ADOPCIÓN NO URGENTE
                            </p>
                        @endif
                    </div>
                </a>
    </div>
    @empty
    <p>No se encontraron anuncios</p>
    @endforelse
</div>
<div class="mt-10 m-4">{{ $anuncios_totales->links('vendor.pagination.tailwind') }}</div>

@endsection

