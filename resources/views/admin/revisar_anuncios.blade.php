@extends('plantilla')
@section('titulo', 'Revisar anuncios')
@section('contenido')
{{-- Si existen anuncios nos aparecerán, si no existen aparecerá un error. Si queremos
    cambiar el estado de un anuncio o ver todos los campos, podemos clickar en el botón
    revisar --}}
@if ($anuncios_totales->isEmpty())
<p class="mx-auto text-center text-3xl m-10 font-semiboldtext-gray-900 uppercase mb-16">No se encontraron anuncios para revisar</p>
@else
<div class="relative overflow-x-auto sm:rounded-lg">
    <p class="mx-auto text-center text-2xl m-10 font-semibold bg-[#FFDEB4] text-gray-900 uppercase rounded-full p-5 w-2/4 border-4 border-zinc-200">Mostrando los datos de los anuncios para revisar</p>
    <table class="w-5/6 text-sm text-gray-500 mx-auto border-2 ">
        <thead class="text-base text-gray-700 uppercase bg-[#FFC090] border-2 border-slate-100">
            <tr class="border-2 ">
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Estado
                </th>
                <th scope="col" class="px-6 py-3">
                    ID Anunciante
                </th>
                <th scope="col" class="px-6 py-3">
                    ID Animal
                </th>
                <th scope="col" class="px-6 py-3">
                    Teléfono
                </th>
                <th scope="col" class="px-6 py-3">
                    Revisar
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($anuncios_totales as $anuncio)
            <tr class="bg-gray-100 hover:bg-gray-50 text-center text-base">
                <td class="px-6 py-4">
                    {{$anuncio->id}}
                </td>
                <td class="px-6 py-4">
                    {{$anuncio->estado}}
                </td>
                <td class="px-6 py-4">
                    {{$anuncio->id_anunciante}}
                </td>
                <td class="px-6 py-4">
                    {{$anuncio->id_animal}}
                </td>
                <td class="px-6 py-4">
                    {{$anuncio->telefono}}
                </td>
                <td class="px-6 py-4">
                    <a href="{{route('admin.revisar_anuncio_id', $anuncio->id)}}">
                    <svg class="mx-auto flex-shrink-0 w-8 h-8 text-gray-500 transition duration-75 hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32"><path d="M28 12H4a2.002 2.002 0 0 0-2 2v14a2.002 2.002 0 0 0 2 2h24a2.002 2.002 0 0 0 2-2V14a2.003 2.003 0 0 0-2-2zm-8 16h-8v-1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1zm8 0h-6v-1a3.003 3.003 0 0 0-3-3h-6a3.003 3.003 0 0 0-3 3v1H4V14h24.002z" fill="currentColor"></path><path d="M16 23a4 4 0 1 1 4-4a4.004 4.004 0 0 1-4 4zm0-6a2 2 0 1 0 2 2a2.002 2.002 0 0 0-2-2z" fill="currentColor"></path><path d="M30 4v4a2.003 2.003 0 0 1-2 2h-4a2.003 2.003 0 0 1-2-2V4a2.003 2.003 0 0 1 2-2h4a2.003 2.003 0 0 1 2 2zm-2 4l.002-4H24v4z" fill="currentColor"></path><path d="M20 4v4a2.003 2.003 0 0 1-2 2h-4a2.002 2.002 0 0 1-2-2V4a2.002 2.002 0 0 1 2-2h4a2.003 2.003 0 0 1 2 2zm-2 4l.002-4H14v4z" fill="currentColor"></path><path d="M10 4v4a2.002 2.002 0 0 1-2 2H4a2.002 2.002 0 0 1-2-2V4a2.002 2.002 0 0 1 2-2h4a2.002 2.002 0 0 1 2 2zM8 8l.002-4H4v4z" fill="currentColor"></path></svg>
                </a>
                </td>
            </tr>
            @empty
            <p>No se encontraron anuncios</p>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-10 m-4">{{ $anuncios_totales->links('vendor.pagination.tailwind') }}</div>
@endif
@endsection
