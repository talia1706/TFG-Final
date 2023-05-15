@extends('plantilla_superusuario')
@section('titulo', 'Página Mostrar Usuario SuperUsuario')
@section('contenido')
<div class="mx-auto w-2/4">
    <p class="mx-auto text-center text-2xl m-10 font-semibold bg-[#FFDEB4] text-gray-900 uppercase rounded-full p-5 w-2/4 border-4 border-zinc-200">Mostrando los datos del usuario {{$datos_usuario_id->id}}</p>
    <table class="w-4/6 text-gray-500 mx-auto border-2">
        <tbody class="text-lg">
            <tr>
                <td scope="col" class="px-6 py-3">
                    <b>ID :</b> {{$datos_usuario_id->id}}
                </td>
            </tr>
            <tr>
                <td scope="col" class="px-6 py-3">
                    <b>Rol :</b> {{$datos_usuario_id->rol}}
                </td>
            </tr>
            <tr>
                <td scope="col" class="px-6 py-3">
                    <b>Nombre :</b> {{$datos_usuario_id->nombre}}
                </td>
            </tr>
            <tr>
                <td scope="col" class="px-6 py-3">
                    <b>Email :</b> {{$datos_usuario_id->email}}
                </td>
            </tr>
            <tr>
                <td scope="col" class="px-6 py-3">
                    <b>País :</b> {{$datos_usuario_id->pais}}
                </td>
            </tr>
            <tr>
                <td scope="col" class="px-6 py-3">
                    <b>Provincia :</b> {{$datos_usuario_id->provincia}}
                </td>
            </tr>
            <tr>
                <td scope="col" class="px-6 py-3">
                    <b>Imagen Perfil :</b>
                    @if ($datos_usuario_id->imagen_perfil == "")
                        Sin imagen de perfil
                    @else
                    <img class="w-full h-60 mx-auto mt-5 object-cover" src="{{URL::asset($datos_usuario_id['imagen_perfil'])}}" alt="Imagen usuario">
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
