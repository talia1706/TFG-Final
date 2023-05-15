@extends('plantilla')
@section('titulo', 'Actividad Anuncio')
@section('contenido')
@if ($anuncios_usuario->isEmpty())
<p class="mx-auto text-center text-3xl m-10 font-semiboldtext-gray-900 uppercase mb-16">No se encontró actividad para este anuncio</p>
@else
<div class="relative overflow-x-auto sm:rounded-lg">
    <p class="mx-auto text-center text-2xl m-10 font-semibold bg-[#FFDEB4] text-gray-900 uppercase rounded-full p-5 w-2/4 border-4 border-zinc-200">Mostrando actividad del anuncio</p>
    <table class="w-5/6 text-sm text-gray-500 mx-auto border-2 ">
        <thead class="text-base text-gray-700 uppercase bg-[#FFC090] border-2 border-slate-100">
            <tr class="border-2 ">
                <th scope="col" class="px-6 py-3">
                    Estado adopción
                </th>
                <th scope="col" class="px-6 py-3">
                    ID Adoptante
                </th>
                <th scope="col" class="px-6 py-3">
                    Email Adoptante
                </th>
                <th scope="col" class="px-6 py-3">
                    Aceptar adopción
                </th>
                <th scope="col" class="px-6 py-3">
                    Denegar adopción
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($anuncios_usuario as $anuncio)
            <tr class="bg-gray-100 hover:bg-gray-50 text-center text-base">
                <td class="px-6 py-4">
                    {{$anuncio->estado}}
                </td>
                <td class="px-6 py-4">
                    {{$anuncio->id_adoptante}}
                </td>
                <td class="px-6 py-4">
                    {{$anuncio->email}}
                </td>
                <td>
                    <a  href="{{route('adopcion.aceptar', $anuncio->id)}}"  class="uppercase border-2 border-transparent text-white bg-green-700 hover:border-1 hover:border-white  hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-base px-4 py-1 text-center inline-flex items-center">
                    <svg class="w-5 h-5"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24"><path d="M5 12l5 5L20 7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    </a>
                </td>
                <td>
                    <a  href="{{route('adopcion.denegar', $anuncio->id)}}"  class="uppercase border-2 border-transparent text-white bg-green-700 hover:border-1 hover:border-white  hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-base px-4 py-1 text-center inline-flex items-center">
                    <svg class="w-5 h-5"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z" fill="currentColor"></path></svg>
                    </a>
                </td>
            </tr>
            @empty
            <p>No se encontraron anuncios subidos</p>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-10 m-4">{{ $anuncios_usuario->links('vendor.pagination.tailwind') }}</div>
@endif
@endsection

