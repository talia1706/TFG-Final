@extends('plantilla')
@section('titulo', 'Actividad Mis Anuncios')
@section('contenido')
@if ($anuncios_usuario->isEmpty())
<p class="mx-auto text-center text-3xl m-10 font-semiboldtext-gray-900 uppercase mb-16">No se encontraron anuncios subidos</p>
<div class="mx-auto text-center mb-16 mt-40">
    <a class="bg-yellow-500 p-4 m-10 rounded-full hover:bg-yellow-600 text-white uppercase text-lg" href="{{route('comun.anunciar')}}">¿Quieres crear nuevos anuncios?</a>
    <a class="bg-yellow-500 p-4 m-10 rounded-full hover:bg-yellow-600 text-white uppercase text-lg" href="{{route('inicio')}}">Volver al menú principal</a>
</div>
@else
<div class="relative overflow-x-auto sm:rounded-lg">
    <p class="mx-auto text-center text-2xl m-10 font-semibold bg-[#FFDEB4] text-gray-900 uppercase rounded-full p-5 w-2/4 border-4 border-zinc-200">Mostrando los datos de los anuncios subidos</p>
    <table class="w-5/6 text-sm text-gray-500 mx-auto border-2 ">
        <thead class="text-base text-gray-700 uppercase bg-[#FFC090] border-2 border-slate-100">
            <tr class="border-2 ">
                <th scope="col" class="px-6 py-3">
                    Anuncio Número
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre Animal
                </th>
                <th scope="col" class="px-6 py-3">
                    Especie
                </th>
                <th scope="col" class="px-6 py-3">
                    Urgente
                </th>
                <th scope="col" class="px-6 py-3">
                    Imagen de perfil
                </th>
                <th scope="col" class="px-6 py-3">
                    Ver actividad
                </th>
                <th scope="col" class="px-6 py-3">
                    Eliminar Anuncio
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($anuncios_usuario as $anuncio)
            <tr class="bg-gray-100 hover:bg-gray-50 text-center text-base">
                <td class="px-6 py-4">
                    {{$anuncio->id}}
                </td>
                <td class="px-6 py-4">
                    {{$anuncio->nombre}}
                </td>
                <td class="px-6 py-4">
                    {{$anuncio->especie}}
                </td>
                <td class="px-6 py-4">
                    {{$anuncio->urgente}}
                </td>
                <td class="px-6 py-4">
                    <img class="w-[100px] mx-auto" src='{{URL::asset($anuncio['imagen_perfil'])}}' alt="Imagen sin cargar">
                </td>
                <td class="px-6 py-4">
                    <a href="{{route('adopcion.mostrar_actividad_anuncio_id', $anuncio->id)}}">
                    <svg class="mx-auto flex-shrink-0 w-8 h-8 text-gray-500 transition duration-75 hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32"><path d="M28 12H4a2.002 2.002 0 0 0-2 2v14a2.002 2.002 0 0 0 2 2h24a2.002 2.002 0 0 0 2-2V14a2.003 2.003 0 0 0-2-2zm-8 16h-8v-1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1zm8 0h-6v-1a3.003 3.003 0 0 0-3-3h-6a3.003 3.003 0 0 0-3 3v1H4V14h24.002z" fill="currentColor"></path><path d="M16 23a4 4 0 1 1 4-4a4.004 4.004 0 0 1-4 4zm0-6a2 2 0 1 0 2 2a2.002 2.002 0 0 0-2-2z" fill="currentColor"></path><path d="M30 4v4a2.003 2.003 0 0 1-2 2h-4a2.003 2.003 0 0 1-2-2V4a2.003 2.003 0 0 1 2-2h4a2.003 2.003 0 0 1 2 2zm-2 4l.002-4H24v4z" fill="currentColor"></path><path d="M20 4v4a2.003 2.003 0 0 1-2 2h-4a2.002 2.002 0 0 1-2-2V4a2.002 2.002 0 0 1 2-2h4a2.003 2.003 0 0 1 2 2zm-2 4l.002-4H14v4z" fill="currentColor"></path><path d="M10 4v4a2.002 2.002 0 0 1-2 2H4a2.002 2.002 0 0 1-2-2V4a2.002 2.002 0 0 1 2-2h4a2.002 2.002 0 0 1 2 2zM8 8l.002-4H4v4z" fill="currentColor"></path></svg>
                </a>
                </td>
                <td class="px-6 py-4">
                    <a href="{{route('anuncio.eliminar_anuncio_id', $anuncio->id)}}">
                    <svg  class="mx-auto flex-shrink-0 w-8 h-8 text-gray-500 transition duration-75 hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"><path d="M296 64h-80a7.91 7.91 0 0 0-8 8v24h96V72a7.91 7.91 0 0 0-8-8z" fill="none"></path><path d="M292 64h-72a4 4 0 0 0-4 4v28h80V68a4 4 0 0 0-4-4z" fill="none"></path><path d="M447.55 96H336V48a16 16 0 0 0-16-16H192a16 16 0 0 0-16 16v48H64.45L64 136h33l20.09 314A32 32 0 0 0 149 480h214a32 32 0 0 0 31.93-29.95L415 136h33zM176 416l-9-256h33l9 256zm96 0h-32V160h32zm24-320h-80V68a4 4 0 0 1 4-4h72a4 4 0 0 1 4 4zm40 320h-33l9-256h33z" fill="currentColor"></path></svg>
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

