@extends('plantilla')
@section('titulo', 'Revisar anuncio')
@section('contenido')
<style>
    tr,td,th{border: 2px solid rgb(182, 182, 182);}
    th{
        text-transform: uppercase;
    }
</style>
{{-- Mostramos los datos del anuncio que tiene ese id, vamos imprimiendo los campos,
    damos las opciones de aceptar o denegar los anuncios --}}
<div class="relative overflow-x-auto sm:rounded-lg">
    <p class="mx-auto text-center text-2xl m-10 font-semibold bg-[#FFDEB4] text-gray-900 uppercase rounded-full p-5 w-2/4 border-4 border-zinc-200">Revisando el anuncio {{$datos_anuncio_id[0]->id}}</p>
    <div class="m-10 flex justify-center space-x-16">
        <a  href="{{route('admin.aceptar', $datos_anuncio_id[0]->id)}}"  class="uppercase border-2 border-transparent text-white bg-green-700 hover:border-1 hover:border-white  hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-lg px-8 py-3 text-center inline-flex items-center">
        Aceptar
        <svg class="w-5 h-5 ml-2 -mr-1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24"><path d="M5 12l5 5L20 7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
        </a>
        <a  href="{{route('admin.denegar', $datos_anuncio_id[0]->id)}}"  class="uppercase border-2 border-transparent text-white bg-green-700 hover:border-1 hover:border-white  hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-lg px-8 py-3 text-center inline-flex items-center">
        Denegar
        <svg class="w-5 h-5 ml-2 -mr-1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z" fill="currentColor"></path></svg>
        </a>
    </div>
    <table class="w-2/6 h-1/2 text-sm text-gray-500 mx-auto">
        <thead class="text-base text-gray-700 bg-[#FFC090] border-2 border-slate-100 mx-auto">
            <tr class="w-1/4">
                <th scope="col" class="px-6 py-3 w-1/4">
                    ID <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->id}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Estado <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->estado}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Teléfono <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->telefono}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    ID Anunciante <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->id_anunciante}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    ID Animal <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->id_animal}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Nombre Anunciante <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->nombre_anunciante}}</td>
                </th>
            </tr>
            <tr class="w-1/4">
                <th scope="col" class="px-6 py-3 w-1/4">
                    País Anunciante <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->pais_anunciante}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Provincia Anunciante <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->provincia_anunciante}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Email Anunciante <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->email}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Rol Anunciante <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->rol}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Nombre Animal <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->nombre}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Especie <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->especie}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Urgente <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->urgente}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Sexo <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->sexo}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Fecha de nacimiento del animal <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->fecha_nacimiento}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Edad Animal <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->edad}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Tamaño <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->tamano}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Peso <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->peso}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Nivel de Actividad <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->nivel_actividad}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Imagen de Perfil <td class="px-6 py-4 bg-white text-center w-1/4"><img class="w-full h-60 mx-auto object-cover m-6" src="{{URL::asset($datos_anuncio_id[0]->imagen_perfil)}}" alt="imagen_perfil_animal" /></td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Descripción <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->descripcion}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    País Animal <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->pais}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Provincia Animal <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->provincia}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Estado General <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->estado_general}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Vacunado <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->vacunado}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Enfermo <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->enfermo}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Alérgico <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->alergico}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Tratado <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->tratado}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Desparasitado <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->desparasitado}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Microchip <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->microchip}}</td>
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 w-1/4">
                    Condiciones de Entrega <td class="px-6 py-4 bg-white text-center w-1/4">{{$datos_anuncio_id[0]->condiciones_entrega}}</td>
                </th>
            </tr>

        </thead>
    </table>
</div>


@endsection
