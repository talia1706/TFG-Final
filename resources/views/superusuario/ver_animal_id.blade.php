@extends('plantilla_superusuario')
@section('titulo', 'Página Mostrar Animal SuperUsuario')
@section('contenido')
<style>
    td,tr,th{
        border: 2px solid rgb(167, 167, 167);
    }
</style>
<div class="relative overflow-x-auto sm:rounded-lg">
    <p class="mx-auto text-center text-2xl m-10 font-semibold bg-[#FFDEB4] text-gray-900 uppercase rounded-full p-5 w-2/4 border-4 border-zinc-200">Mostrando los datos del animal {{$datos_animal_id->id}}</p>
    <table class="w-4/6 text-sm text-gray-500 mx-auto">
        <thead class="text-base text-gray-700 uppercase bg-[#FFC090] border-2 border-slate-100 mx-auto">
            <tr class="w-1/4">
                <th scope="col" class="px-6 py-3 w-1/4">
                    ID <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_animal_id->id}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Nombre <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_animal_id->nombre}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Especie <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_animal_id->especie}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Urgente <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_animal_id->urgente}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Sexo <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_animal_id->sexo}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Fecha Nacimiento <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_animal_id->fecha_nacimiento}}</td>
                </th>
            </tr>
            <tr class="w-1/4">
                <th scope="col" class="px-6 py-3 w-1/4">
                    Edad <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_animal_id->edad}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    tamaño <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_animal_id->tamano}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    peso <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_animal_id->peso}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    nivel de actividad <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_animal_id->nivel_actividad}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    imagen de perfil <td class="px-3 py-2 bg-white text-center w-1/4"> <img class="w-full h-60 mx-auto object-cover" src="{{URL::asset($datos_animal_id['imagen_perfil'])}}" alt="imagen_perfil_animal" /></td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    descripcion <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_animal_id->descripcion}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    pais <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_animal_id->pais}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    provincia <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_animal_id->provincia}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    estado general <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_animal_id->estado_general}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    vacunado <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_animal_id->vacunado}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    enfermo <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_animal_id->enfermo}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    alergico <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_animal_id->alergico}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    tratado <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_animal_id->tratado}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    desparasitado <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_animal_id->desparasitado}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    microchip <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_animal_id->microchip}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    condiciones entrega <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_animal_id->condiciones_entrega}}</td>
                </th>
            </tr>
        </thead>
    </table>
</div>
@endsection
