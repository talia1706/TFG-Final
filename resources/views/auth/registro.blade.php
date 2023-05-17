@extends('plantilla_log')
@section('titulo', 'Registro')
@section('contenido')
<?php
    $json = file_get_contents(__DIR__."\\rows.json");
    $array_provincias = json_decode($json, true);
?>
{{-- Mostramos el formulario de registro y añadimos un botón para registrar la cuenta --}}
<div class="px-4 py-8 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-lg">
      <h1 class="text-center text-2xl font-bold text-green-600 sm:text-3xl">
        Registro
      </h1>
      <img class="mx-auto w-[30%] mb-4 mt-4" src="{{ asset('/img/Dog paw-pana.png') }}" alt="imagen_perro">
    <a href="{{route('login.index')}}" class="text-sm ml-2 cursor-pointer"><p class="text-center">¿Ya tienes cuenta en Animalia? Inicia Sesión</p></a>
      <form action="" method="POST">
        @csrf
        <div class="flex items-center border-2 py-2 px-3 rounded-2xl ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
            fill="currentColor">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <input value="{{ old('nombre') }}" size="50" type="text" name="nombre" class="bg-transparent pl-2 outline-none border-none" id="nombre" placeholder="Introduce tu nombre">
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
         <input value="{{ old('email') }}" size="50" class="bg-transparent pl-2 outline-none border-none" type="email" id="email" placeholder="Introduce tu email" name="email">
        </div>
            @error('email')
                <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white">{{$message}}</p>
            @enderror
        <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
            <label for="rol">Selecciona tu tipo de cuenta</label>&nbsp;&nbsp;
            @if (old('rol') =="particular")
            <input class="border peer/draft pl-2 outline-none border-none" type="radio" name="rol" value="asociacion">&nbsp; Asociacion &nbsp;
            <input class="border peer/draft pl-2 outline-none border-none" type="radio" name="rol" value="particular" checked>&nbsp; Particular
            @endif
            @if (old('rol') =="asociacion")
            <input class="border peer/draft pl-2 outline-none border-none" type="radio" name="rol" value="asociacion" checked>&nbsp; Asociacion &nbsp;
            <input class="border peer/draft pl-2 outline-none border-none" type="radio" name="rol" value="particular">&nbsp; Particular
            @endif
            @if (old('rol') =="")
            <input class="border peer/draft pl-2 outline-none border-none" type="radio" name="rol" value="asociacion">&nbsp; Asociacion &nbsp;
            <input class="border peer/draft pl-2 outline-none border-none" type="radio" name="rol" value="particular">&nbsp; Particular
            @endif
        </div>
            @error('rol')
                <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white">{{$message}}</p>
            @enderror
        <div class="flex-row items-center border-2 py-2 px-3 rounded-2xl mb-4">
            <select name="pais" id="pais" class="form-control">
                @if (old('pais') =="")
                <option disabled selected >Selecciona tu país</option>
                <option value="España">España</option>
                @endif
                @if (old('pais') =="España")
                <option value="España" selected>España</option>
                @endif
            </select>
        </div>
            @error('pais')
                <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white">{{$message}}</p>
            @enderror
        <div class="flex-row items-center border-2 py-2 px-3 rounded-2xl mb-4">
            <select name="provincia" id="provincia" class="form-control">
                @if (old('provincia') =="")
                <option disabled selected>Selecciona tu provincia</option>
                @foreach ($array_provincias as $value)
                    <option value="{{$value['label']}}">{{$value['label']}}</option>
                @endforeach
                @endif
                @foreach ($array_provincias as $value)
                @if (old('provincia') ==$value['label'])
                    <option value="{{old('provincia')}}" selected>{{old('provincia')}}</option>
                    @endif
                    <option value="{{$value['label']}}">{{$value['label']}}</option>
                @endforeach
            </select>
        </div>
            @error('provincia')
                <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white">{{$message}}</p>
            @enderror

            <div><p>La contraseña debe contener:
               <br> - Longitud mínima 8.
               <br> - 1 mayúscula.
               <br> - 1 minúscula.
               <br> - 1 número.
               <br> - 1 carácter</p></div>
        <div class="flex items-center border-2 py-2 px-3 rounded-2xl ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                    clip-rule="evenodd" />
            </svg>
             <input size="45" class="bg-transparent pl-2 outline-none border-none placeholder-lg" type="password" class="form-control" id="contrasena" placeholder="Introduce una contraseña " name="password">
             <div class="col">
                <button type="button" onclick="mostrarContrasena()">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20"><g fill="none"><path d="M12 9.005a4 4 0 1 1 0 8a4 4 0 0 1 0-8zM12 5.5c4.613 0 8.596 3.15 9.701 7.564a.75.75 0 1 1-1.455.365a8.504 8.504 0 0 0-16.493.004a.75.75 0 0 1-1.456-.363A10.003 10.003 0 0 1 12 5.5z" fill="currentColor"></path></g></svg>
                </button>
              </div>
            </div>
            @error('password')
                <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white">{{$message}}</p>
            @enderror




            <div class="flex items-center border-2 py-2 px-3 rounded-2xl ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                        clip-rule="evenodd" />
                </svg>
                <input size="45" type="password" class="bg-transparent pl-2 outline-none border-none" id="contrasena_confirmada" name="password_confirmation" placeholder="Confirma tu contraseña">
                <div class="col">
                    <button type="button" onclick="mostrarContrasenaConfirmada()">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20"><g fill="none"><path d="M12 9.005a4 4 0 1 1 0 8a4 4 0 0 1 0-8zM12 5.5c4.613 0 8.596 3.15 9.701 7.564a.75.75 0 1 1-1.455.365a8.504 8.504 0 0 0-16.493.004a.75.75 0 0 1-1.456-.363A10.003 10.003 0 0 1 12 5.5z" fill="currentColor"></path></g></svg>
                    </button>
                  </div>
            </div>
                @error('password')
                    <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white">{{$message}}</p>
                @enderror
        <div class="m-3">
        @error('message')
        <p>{{$message}}</p>
        @enderror
        </div>
        <button type="submit" class="block w-full bg-green-700 mt-4 py-2 rounded-2xl text-white font-semibold mb-3">Regístrate</button>
    </form>
    </div>
    <script>
        function mostrarContrasena(){
            var tipo = document.getElementById("contrasena");
            if(tipo.type == "password"){
                tipo.type = "text";
            }else{
                tipo.type = "password";
            }
        }

        function mostrarContrasenaConfirmada(){
            var tipo = document.getElementById("contrasena_confirmada");
            if(tipo.type == "password"){
                tipo.type = "text";
            }else{
                tipo.type = "password";
            }
        }
      </script>

@endsection
