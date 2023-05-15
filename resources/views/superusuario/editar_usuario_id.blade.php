@extends('plantilla_superusuario')
@section('titulo', 'Página Editar Usuario SuperUsuario')
@section('contenido')
<?php
$json = file_get_contents(__DIR__."\\rows.json");
$array_provincias = json_decode($json, true);
?>
<div class="relative overflow-x-auto sm:rounded-lg">
    <p class="mx-auto text-center text-2xl m-10 font-semibold bg-[#FFDEB4] text-gray-900 uppercase rounded-full p-5 w-2/4 border-4 border-zinc-200">Editando los datos del usuario {{$datos_usuario_id->id}}</p>
    <form action="{{route('superusuario.actualizar_usuario', $datos_usuario_id['id'])}}" method="POST" class="w-2/4 mx-auto">
        @csrf

        <div class="flex items-center border-2 py-2 px-3 rounded-2xl ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
            fill="currentColor">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <input  value="<?php echo $datos_usuario_id['nombre']?>"  size="50" type="text" name="nombre" class="bg-transparent pl-2 outline-none border-none" id="nombre" placeholder="Introduce tu nombre" required>
        </div>

        <div class="flex items-center border-2 py-2 px-3 rounded-2xl ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
        </svg>
         <input  value="<?php echo $datos_usuario_id['email']?>" size="50" class="bg-transparent pl-2 outline-none border-none" type="email" id="email" placeholder="Introduce tu email" name="email" required>
        </div>

        <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
            <label for="rol">Selecciona tu tipo de cuenta</label>&nbsp;&nbsp;
            @if($datos_usuario_id['rol'] == "particular")
                <input class="border peer/draft pl-2 outline-none border-2 border-black" type="radio" name="rol" value="asociacion">&nbsp; Asociacion &nbsp;
                <input class="border peer/draft pl-2 outline-none border-2 border-black" checked type="radio" name="rol" value="particular">&nbsp; Particular &nbsp;
                <input class="border peer/draft pl-2 outline-none border-2 border-black" type="radio" name="rol" value="admin">&nbsp; Admin &nbsp;
            @elseif($datos_usuario_id['rol'] == "asociacion")
                <input class="border peer/draft pl-2 outline-none border-2 border-black" checked type="radio" name="rol" value="asociacion">&nbsp; Asociacion &nbsp;
                <input class="border peer/draft pl-2 outline-none border-2 border-black" type="radio" name="rol" value="particular">&nbsp; Particular &nbsp;
                <input class="border peer/draft pl-2 outline-none border-2 border-black" type="radio" name="rol" value="admin">&nbsp; Admin &nbsp;
            @else
                <input class="border peer/draft pl-2 outline-none border-2 border-black" checked type="radio" name="rol" value="admin">&nbsp; Admin &nbsp;
                <input class="border peer/draft pl-2 outline-none border-2 border-black" type="radio" name="rol" value="asociacion">&nbsp; Asociacion &nbsp;
                <input class="border peer/draft pl-2 outline-none border-2 border-black" type="radio" name="rol" value="particular">&nbsp; Particular
            @endif
        </div>
        <div class="flex-row items-center border-2 py-2 px-3 rounded-2xl mb-4">
            <select name="pais" id="pais" class="form-control border-1 border-white" required>
                <option value="{{$datos_usuario_id['pais']}}"  selected>{{$datos_usuario_id['pais']}}</option>;
            </select>
        </div>
        <div class="flex-row items-center border-2 py-2 px-3 rounded-2xl mb-4">
            <select name="provincia" id="provincia" class="form-control border-1 border-white" required>
                <option value="{{$datos_usuario_id['provincia']}}" selected>{{$datos_usuario_id['provincia']}}</option>;
                @foreach ($array_provincias as $value)
                    <option value="{{$value['label']}}">{{$value['label']}}</option>
                @endforeach
            </select>
        </div>
        </div>
        <div class="m-3">
        </div>
        <button type="submit" class="block w-1/4 bg-green-700 mt-4 py-2 rounded-2xl text-white font-semibold mb-3 mx-auto">Modificar datos</button>
    </form>
</div>
@endsection
