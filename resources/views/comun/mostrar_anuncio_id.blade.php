@extends('plantilla')
@section('titulo', 'Mostrar Anuncio')
@section('contenido')
<div class="cajaMostrarAnuncioId">
    @forelse ($anuncio_id as $anuncio)
                    <div class="px-6 text-center">
                        <div class="mb-3"><p class="text-gray-700 text-4xl font-bold mb-2">{{$anuncio->nombre}}</p></div>
                        {{--<div class="mb-3"><img class="w-3/5 mx-auto" src='{{URL::asset($anuncio['imagen_perfil'])}}' alt="Foto portada"></div>--}}
                        <div class="mb-3"><img class="h-[350px] w-[350px] object-cover mx-auto" src='{{URL::asset($anuncio['imagen_perfil'])}}' alt="Foto portada"></div>
                        <p class="text-gray-700 text-center text-2xl mb-6 font-bold">Información general</p>
                        <p class="text-gray-700 text-lg mb-6"><b> Teléfono de contacto: </b> {{$anuncio->telefono}}</p>
                        <p class="text-gray-700 text-lg mb-6"><b>Anunciado por:</b> {{$anuncio->rol}}</p>
                        @if ($anuncio->urgente=="si")
                        <div class="mb-6"><p class="text-gray-200 text-lg mb-2 bg-red-700 rounded-full w-1/3 mx-auto p-1 pl-2 pr-2">ESTADO URGENTE</p></div>
                        @endif
                        <div class="mb-3"><p class="text-gray-700 text-lg mb-2"><b>Se encuentra en:</b> {{$anuncio->provincia}}, {{$anuncio->pais}}</p></div>
                        <div class="mb-3"><p class="text-gray-700 text-lg mb-2"><b>Su especie es:</b> {{$anuncio->especie}}</p></div>
                        <div class="mb-3"><p class="text-gray-700 text-lg mb-2"><b>Sexo:</b> {{$anuncio->sexo}}</p></div>
                        <div class="mb-3"><p class="text-gray-700 text-lg mb-2"><b>Nació el:</b> {{$anuncio->fecha_nacimiento}}</p></div>
                        <div class="mb-3"><p class="text-gray-700 text-lg mb-2"><b>Es:</b> {{$anuncio->edad}}</p></div>
                        <div class="mb-3"><p class="text-gray-700 text-lg mb-2"><b>Su tamaño es:</b> {{$anuncio->tamano}}</p></div>
                        <div class="mb-3"><p class="text-gray-700 text-lg mb-2"><b>Pesa:</b> {{$anuncio->peso}}</p></div>
                        <div class="mb-3"><p class="text-gray-700 text-lg mb-2"><b>Su actividad es:</b> {{$anuncio->nivel_actividad}}</p></div>
                        <div class="mb-6"><p class="text-gray-700 text-lg mb-2"><b>Su estado es:</b> {{$anuncio->estado_general}}</p></div>
                        <p class="text-gray-700 text-center text-2xl mb-6 font-bold">El animal se entrega</p>
                        @if ($anuncio->vacunado == "si")
                            <li class="text-gray-700 text-center text-lg mb-6">Vacunado</li>
                        @endif
                        @if ($anuncio->desparasitado == "si")
                            <li class="text-gray-700 text-center text-lg mb-6">Desparasitado</li>
                        @endif
                        @if ($anuncio->microchip == "si")
                            <li class="text-gray-700 text-center text-lg mb-6">Con microchip</li>
                        @endif
                        @if ($anuncio->microchip == "no" && $anuncio->desparasitado == "no" && $anuncio->vacunado == "no")
                            <li class="text-gray-700 text-center text-lg mb-6">Necesitando vacunación, desparasitación y microchip</li>
                        @endif

                        <p class="text-gray-700 text-center text-2xl mb-6 font-bold">Enfermedades y/o alérgenos</p>
                        @if ($anuncio->enfermo == "si")
                            <li class="text-gray-700 text-center text-lg mb-6">El animal está enfermo</li>
                        @endif
                        @if ($anuncio->alergico == "si")
                            <li class="text-gray-700 text-center text-lg mb-6">El animal es alérgico</li>
                        @endif
                        @if ($anuncio->tratado == "si")
                            <li class="text-gray-700 text-center text-lg mb-6">El animal está en tratamiento</li>
                        @endif
                        @if ($anuncio->tratado == "no" && $anuncio->alergico == "no" && $anuncio->enfermo == "no")
                        <li class="text-gray-700 text-center text-lg mb-6">El animal no tiene enfermedades ni alérgenos ni tratamientos</li>
                        @endif
                        <p class="text-gray-700 text-center text-2xl mb-6 font-bold">Condiciones entrega</p>
                        <div class="mb-3"><p class="text-gray-700 text-lg mb-2">{{$anuncio->condiciones_entrega}}</p></div>
                        <p class="text-gray-700 text-center text-2xl mb-6 font-bold">Descripción del animal</p>
                        <div class="mb-6"><p class="text-gray-700 text-lg mb-2">{{$anuncio->descripcion}}</p></div>
                        @if ($anuncio->id_anunciante == auth()->user()->id)
                            <div class="mb-3"><p class="text-gray-700 text-lg mb-2 font-bold">Este anuncio es tuyo</p></div>
                        @elseif (auth()->user()->rol == "asociacion")

                        @else
                            <div class="mb-3">
                                <a href="{{route('adopcion.insertar_adopcion', ['id_anuncio' => $anuncio->id, 'id_adoptante' => auth()->user()->id])}}" class="text-2xl p-2 hover:bg-green-900 border-2 border-transparent text-white bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg">ADÓPTAME</a>

                            </div>
                        @endif
                    </div>
    </div>
    @empty
    <p>No se encontraron datos del anuncio</p>
    @endforelse
</div>
<div class="mt-10 m-4">{{ $anuncio_id->links('vendor.pagination.tailwind') }}</div>

@endsection

