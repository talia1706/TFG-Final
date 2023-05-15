@extends('plantilla_superusuario')
@section('titulo', 'Añadir Usuarios')
@section('contenido')
<?php
    $json = file_get_contents(__DIR__."\\rows.json");
    $array_provincias = json_decode($json, true);
?>
    <div class="mx-auto max-w-lg">
      <h1 class="text-center text-2xl font-bold text-green-600 sm:text-3xl mb-6">Añadir Usuarios</h1>
      <form action="{{route('superusuario.insertar_usuario')}}" method="POST">
        @csrf
        <div class="flex items-center border-2 py-2 px-3 rounded-2xl ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
            fill="currentColor">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <input required value="{{ old('nombre') }}" size="50" type="text" name="nombre" class="bg-transparent pl-2 outline-none border-none" id="nombre" placeholder="Introduce el nombre">
        </div>
        @error('nombre')
            <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white">{{$message}}</p>
        @enderror

        <div class="flex items-center border-2 py-2 px-3 rounded-2xl ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
        </svg>
         <input required value="{{ old('email') }}" size="50" class="bg-transparent pl-2 outline-none border-none" type="email" id="email" placeholder="Introduce el email" name="email">
        </div>
        @error('email')
            <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white">{{$message}}</p>
        @enderror

        <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
            <label for="rol">Selecciona el tipo de cuenta</label>&nbsp;
            <input class="border peer/draft pl-2 outline-none border-2 border-black" type="radio" name="rol" value="admin">&nbsp; Admin &nbsp;
            <input class="border peer/draft pl-2 outline-none border-2 border-black" type="radio" name="rol" value="asociacion">&nbsp; Asociacion &nbsp;
            <input class="border peer/draft pl-2 outline-none border-2 border-black" type="radio" name="rol" value="particular">&nbsp; Particular
        </div>
        @error('rol')
            <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white">{{$message}}</p>
        @enderror


        <div class="flex-row items-center border-2 py-2 px-3 rounded-2xl mb-4">
            <select required name="pais" id="pais" class="form-control border-white">
                <option disabled selected >Selecciona el país</option>
                <option value="España">España</option>
            </select>
        </div>

        @error('pais')
            <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white">{{$message}}</p>
        @enderror

        <div class="flex-row items-center border-2 py-2 px-3 rounded-2xl mb-4">
            <select required name="provincia" id="provincia" class="form-control border-white">
                <option disabled selected>Selecciona la provincia</option>
                @foreach ($array_provincias as $value)
                    <option value="{{$value['label']}}">{{$value['label']}}</option>
                @endforeach
            </select>
        </div>

        @error('provincia')
            <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white">{{$message}}</p>
        @enderror


        <div class="flex items-center border-2 py-2 px-3 rounded-2xl ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                    clip-rule="evenodd" />
            </svg>
            <input required size="50" class="bg-transparent pl-2 outline-none border-none" type="password" class="form-control" id="contrasena" placeholder="Introduce la contraseña" name="password">
        </div>

        @error('password')
            <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white">{{$message}}</p>
        @enderror

        <button type="submit" class="block w-full bg-green-700 mt-4 py-2 rounded-2xl text-white font-semibold mb-3">Añadir</button>
    </form>
    </div>


@endsection
