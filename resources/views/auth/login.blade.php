@extends('plantilla_log')
@section('titulo', 'Login')
@section('contenido')
{{-- Hacemos formulario Login pidiendo los campos necesarios para iniciar sesión,
    y posteriormente se verificarán en el controlador --}}
  <div class="h-screen md:flex">
    <div
        class="relative overflow-hidden md:flex w-1/2 bg-gradient-to-tr from-green-600 to-green-800 i justify-around items-center hidden">
        <div>
            <h1 class="text-white font-bold text-4xl font-sans">Animalia</h1>
            <p class="text-white mt-1 text-base">Tu página web de ayuda a los animales de confianza</p>
        </div>
        <div class="absolute -bottom-32 -left-40 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
        <div class="absolute -bottom-40 -left-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
        <div class="absolute -top-40 -right-0 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
        <div class="absolute -top-20 -right-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
    </div>
    <div class="flex md:w-1/2 justify-center py-10 items-center bg-white">
        <form class="bg-white" action="" method="POST">
            @csrf
            <h1 class="text-gray-800 font-bold text-2xl mb-1">Login</h1>
            <p class="text-base font-normal text-gray-600 mb-7">¡Bienvenido/a, inicia sesión!</p>
            <div class="flex items-center border-2 py-2 px-3 rounded-2xl ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
            </svg>
             <input size="30" class="pl-2 outline-none border-none" type="email" id="email" placeholder="Introduce tu email" name="email">
            </div>
            <div class="flex items-center border-2 py-2 px-3 rounded-2xl ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                        clip-rule="evenodd" />
                </svg>
                <input size="30" class="pl-2 outline-none border-none" type="password" class="form-control" id="contrasena" placeholder="Introduce tu contraseña" name="password">
            </div>
            <div class="m-3">
            @error('message')
            <p>{{$message}}</p>
            @enderror
            </div>
            <button type="submit" class="block w-full bg-green-700 mt-4 py-2 rounded-2xl text-white font-semibold mb-3">Iniciar Sesión</button>
            <a href="{{route('registro.index')}}" class="text-sm ml-2 hover:text-blue-500 cursor-pointer">¿No tienes cuenta en Animalia? Regístrate</a>
        </form>
    </div>
@endsection
