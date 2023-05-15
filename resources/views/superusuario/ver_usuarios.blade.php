@extends('plantilla_superusuario')
@section('titulo', 'Página Mostrar Usuarios SuperUsuario')
@section('contenido')
@if ($usuarios_totales->isEmpty())
<p class="mx-auto text-center text-3xl m-10 font-semiboldtext-gray-900 uppercase mb-16">No se encontraron usuarios</p>
<div class="mx-auto text-center mb-16">
<a class="bg-yellow-500 p-4 m-10 rounded-full hover:bg-yellow-600 text-white uppercase text-lg" href="{{route('superusuario.anadir_usuario')}}">¿Quieres crear nuevos usuarios?</a>
<a class="bg-yellow-500 p-4 m-10 rounded-full hover:bg-yellow-600 text-white uppercase text-lg" href="{{route('superusuario.index')}}">Volver al menú principal</a>
</div>
@else
<div class="relative overflow-x-auto sm:rounded-lg">
    <p class="mx-auto text-center text-2xl m-10 font-semibold bg-[#FFDEB4] text-gray-900 uppercase rounded-full p-5 w-2/4 border-4 border-zinc-200">Mostrando los datos de los usuarios existentes</p>
    <table class="w-5/6 text-sm text-gray-500 mx-auto border-2 ">
        <thead class="text-base text-gray-700 uppercase bg-[#FFC090] border-2 border-slate-100">
            <tr class="border-2 ">
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
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
                <th scope="col" class="px-6 py-3">
                    Ver
                </th>
                <th scope="col" class="px-6 py-3">
                    editar
                </th>
                <th scope="col" class="px-6 py-3">
                    borrar
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($usuarios_totales as $usuario)
            <tr class="bg-gray-100 hover:bg-gray-50 text-center text-base">
                <td class="px-6 py-4">
                    {{$usuario->id}}
                </td>
                <td class="px-6 py-4">
                    {{strtoupper($usuario->rol)}}
                </td>
                <td class="px-6 py-4">
                    {{$usuario->nombre}}
                </td>
                <td class="px-6 py-4">
                    {{$usuario->email}}
                </td>
                <td class="px-6 py-4">
                    {{$usuario->pais}}
                </td>
                <td class="px-6 py-4">
                    {{$usuario->provincia}}
                </td>
                <td class="px-6 py-4">
                    @if ($usuario->imagen_perfil == "")
                    <img class="w-12 h-12 rounded-full border-1 border-slate-300 mx-auto" src="{{ asset('/img/sin_imagen.png') }}" alt="user photo">
                    @else
                    <img class="w-12 h-12 rounded-full mx-auto object-cover" src="{{ $usuario->imagen_perfil }}" alt="Imagen usuario">
                    @endif
                </td>
                <td class="px-6 py-4">
                    <a href="{{route('superusuario.ver_usuario_id', $usuario->id)}}">
                    <svg class="mx-auto flex-shrink-0 w-8 h-8 text-gray-500 transition duration-75 hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z" fill="currentColor"></path></svg>
                    </a>
                </td>
                <td class="px-6 py-4">
                    <a href="{{route('superusuario.editar_usuario_id', $usuario->id)}}">
                    <svg  class="mx-auto flex-shrink-0 w-8 h-8 text-gray-500 transition duration-75 hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32"><path d="M2 26h28v2H2z" fill="currentColor"></path><path d="M25.4 9c.8-.8.8-2 0-2.8l-3.6-3.6c-.8-.8-2-.8-2.8 0l-15 15V24h6.4l15-15zm-5-5L24 7.6l-3 3L17.4 7l3-3zM6 22v-3.6l10-10l3.6 3.6l-10 10H6z" fill="currentColor"></path></svg>
                    </a>
                </td>
                <td class="px-6 py-4">
                    <a href="{{route('superusuario.eliminar_usuario_id', $usuario->id)}}">
                    <svg  class="mx-auto flex-shrink-0 w-8 h-8 text-gray-500 transition duration-75 hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"><path d="M296 64h-80a7.91 7.91 0 0 0-8 8v24h96V72a7.91 7.91 0 0 0-8-8z" fill="none"></path><path d="M292 64h-72a4 4 0 0 0-4 4v28h80V68a4 4 0 0 0-4-4z" fill="none"></path><path d="M447.55 96H336V48a16 16 0 0 0-16-16H192a16 16 0 0 0-16 16v48H64.45L64 136h33l20.09 314A32 32 0 0 0 149 480h214a32 32 0 0 0 31.93-29.95L415 136h33zM176 416l-9-256h33l9 256zm96 0h-32V160h32zm24-320h-80V68a4 4 0 0 1 4-4h72a4 4 0 0 1 4 4zm40 320h-33l9-256h33z" fill="currentColor"></path></svg>
                    </a>
                </td>
            </tr>
            @empty
            <p>No se encontraron usuarios</p>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-10 m-4">{{ $usuarios_totales->links('vendor.pagination.tailwind') }}</div>

@endif
@endsection
