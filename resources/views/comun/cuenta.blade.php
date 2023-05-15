@extends('plantilla')
@section('titulo', 'Cuenta')
@section('contenido')
@if (auth()->user()->rol == "superusuario")
@include('superusuario.sidebar');
@endif
{{-- id nombre pais provincia email password rol --}}
<?php
    $json = file_get_contents(__DIR__."\\rows.json");
    $array_provincias = json_decode($json, true);
?>
<style>
    .archivo {
        width: 80px;
        height: 80px;
        overflow: hidden;
        }
    #file {
        background-image: url("$datos_usuario_id['imagen_perfil']");
        height: 80px;
        background-size: 80px 80px;
        padding-left: 80px;
        }
</style>
    <div class="container max-w-screen-lg mx-auto flex  items-center justify-center">
        <div class="bg-white rounded p-4 px-4 md:p-8 mb-6">
                <form action="{{route('comun.actualizardatos', $datos_usuario_id['id'])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <p class="font-medium text-2xl text-center mb-4">Información Personal</p>
                @if ($datos_usuario_id->imagen_perfil == "")
                <div class="flex">
                    <input class="mx-auto m-3" max id="imagen_perfil" name="imagen_perfil" accept="image/*" multiple type="file">
                </div>
                @else
                <div class="mx-auto flex items-center justify-center">
                    <img class="rounded-full mx-auto object-cover w-[150px]" src="{{URL::asset($datos_usuario_id['imagen_perfil'])}}" alt="Imagen usuario">
                </div>
                <div class="flex">
                <input class="mx-auto m-3" max id="imagen_perfil" name="imagen_perfil" accept="image/*" multiple type="file">
                </div>
                @endif
                <div class="lg:col-span-3">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-6 md:grid-cols-5">
                <div class="md:col-span-2.5 lg:col-span-6">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" id="nombre" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{$datos_usuario_id['nombre']}}" />
                </div>
                @error('nombre')
                <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
                @enderror
                <div class="md:col-span-2.5 lg:col-span-6">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{$datos_usuario_id['email']}}" />
                </div>
                @error('email')
                <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
                @enderror
                <div class="md:col-span-2 lg:col-span-3">
                  <label for="pais">País</label>
                    <select class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" name="pais" id="pais" >
                        <option value="España">España</option>
                    </select>
                </div>
                @error('pais')
                <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
                @enderror
                <div class="md:col-span-2 lg:col-span-3">
                  <label for="provincia">Provincia</label>
                  <select  class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" name="provincia" id="provincia" >
                    <option value="{{$datos_usuario_id['provincia']}}" selected>{{$datos_usuario_id['provincia']}}</option>
                    @foreach ($array_provincias as $value)
                        <option value="{{$value['label']}}">{{$value['label']}}</option>
                    @endforeach
                    </select>
                </div>
                @error('provincia')
                <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
                @enderror
                <input type="hidden" name="id" value="{{$datos_usuario_id['id']}}">
                <div class="md:col-span-5">
                  <div class="inline-flex items-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar cambios</button>
                  </div>
                </div>
            </div>
          </div>
            </form>
        </div>
    </div>
  </div>


@endsection
