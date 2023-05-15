@extends('plantilla')
@section('titulo', 'Error 404')
@section('contenido')
<div class="grid h-auto place-items-center mt-20">
    <p class="text-center text-2xl">Lo sentimos, la página que busca no existe.
    <div class="w-96 mt-10">
    <img src="{{URL::asset('img/404_error.png')}}" alt="Error al cargar la imagen">
    </div>
</div>
@endsection
