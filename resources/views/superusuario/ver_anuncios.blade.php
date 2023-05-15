@extends('plantilla_superusuario')
@section('titulo', 'Página Mostrar Anuncios SuperUsuario')
@section('contenido')
@include('superusuario.sidebar');
@if ($anuncios_totales->isEmpty())
<p class="mx-auto text-center text-3xl m-10 font-semiboldtext-gray-900 uppercase mb-16">No se encontraron anuncios</p>
<div class="mx-auto text-center mb-16">
<a class="bg-yellow-500 p-4 m-10 rounded-full hover:bg-yellow-600 text-white uppercase text-lg" href="">¿Quieres crear nuevos anuncios?</a>
<a class="bg-yellow-500 p-4 m-10 rounded-full hover:bg-yellow-600 text-white uppercase text-lg" href="{{route('superusuario.index')}}">Volver al menú principal</a>
</div>
@else
<div class="relative overflow-x-auto sm:rounded-lg">
    <p class="mx-auto text-center text-2xl m-10 font-semibold bg-[#FFDEB4] text-gray-900 uppercase rounded-full p-5 w-2/4 border-4 border-zinc-200">Mostrando los datos de los anuncios existentes</p>
    <table class="w-5/6 text-sm text-gray-500 mx-auto">
        <thead class="text-base text-gray-700 uppercase bg-[#FFC090] border-2 border-slate-100">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Rol
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    País
                </th>
                <th scope="col" class="px-6 py-3">
                    Provincia
                </th>
                <th scope="col" class="px-6 py-3">
                    Imagen Perfil
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($anuncios_totales as $anuncio)
            {{-- <tr class="bg-gray-100 border-2 hover:bg-gray-50 text-center text-base">
                <td class="px-6 py-4">
                    {{strtoupper($anuncio->rol)}}
                </td>
                <td class="px-6 py-4">
                    {{$anuncio->nombre}}
                </td>
                <td class="px-6 py-4">
                    {{$anuncio->email}}
                </td>
                <td class="px-6 py-4">
                    {{$anuncio->pais}}
                </td>
                <td class="px-6 py-4">
                    {{$anuncio->provincia}}
                </td>
                <td class="px-6 py-4">
                    @if ($anuncio->imagen_perfil == "")
                    <img class="w-12 h-12 rounded-full border-1 border-slate-300 mx-auto" src="{{ asset('/img/sin_imagen.png') }}" alt="user photo">
                    @else
                    <img class="w-12 h-12 rounded-full mx-auto" src="{{ $anuncio->imagen_perfil }}" alt="Imagen anuncio">
                    @endif
                </td>
            </tr> --}}
            @empty
            <p>No se encontraron anuncios</p>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-10 m-4">{{ $anuncios_totales->links('vendor.pagination.tailwind') }}</div>

@endif
@endsection
