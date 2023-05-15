@extends('plantilla')
@section('titulo', 'Protectoras')
@section('contenido')
{{-- Si existen asociaciones, las mostramos --}}
@if ($asociaciones->isEmpty())
<p class="text-center text-2xl p-10 font-semibold">No se encontraron asociaciones</p>
@else
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <p class="text-center text-2xl p-10 font-semibold">Mostrando los datos de las asociaciones existentes</p>
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-slate-50 border-2 border-slate-100">
            <tr>
                <th scope="col" class="p-4">
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    País
                </th>
                <th scope="col" class="px-6 py-3">
                    Provincia
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($asociaciones as $asociacion)
            <tr class="bg-white border-b hover:bg-gray-50">
                <td class="px-6 py-4">
                    <img class="w-10 h-10 rounded-full ml-20" src="{{ asset('/img/foto_animales.jpeg') }}" alt="Jese image">

                </td>
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                    <div class="pl-3">
                        <div class="text-base font-semibold">{{$asociacion->nombre}}</div>
                        <div class="font-normal text-gray-500">{{$asociacion->email}}</div>
                    </div>
                </th>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <div class="font-normal text-gray-500"></div> {{$asociacion->pais}}
                    </div>
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-normal text-gray-500">{{$asociacion->provincia}}</a>
                </td>
            </tr>
            @empty
            <p>No se encontraron asociaciones</p>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-10 m-4">{{ $asociaciones->links('vendor.pagination.tailwind') }}</div>

@endif
@endsection
