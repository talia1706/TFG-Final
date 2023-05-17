@extends('plantilla')
@section('titulo', 'Error 500')
@section('contenido')
<div class="grid h-auto place-items-center mt-20">
    <div class="w-[600px]">
    <img src="{{URL::asset('img/500_error.png')}}" alt="Error al cargar la imagen">
    </div>
</div>
@endsection
