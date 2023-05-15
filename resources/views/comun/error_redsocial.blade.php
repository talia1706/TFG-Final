@extends('plantilla')
@section('titulo', 'Error Red Social')
@section('contenido')
<div class="grid h-auto place-items-center mt-20">
<p class="text-center text-2xl">Lo sentimos, actualmente Animalia no cuenta con una cuenta de {{$red}}.
<br> ¡Pronto volveremos con novedades!</p>
<div class="w-96 mt-10">
@if ($red == "Facebook")
<img src="{{URL::asset('img/rabbit-pana.png')}}" alt="Error al cargar la imagen">
@elseif ($red == "Twitter")
<img src="{{URL::asset('img/Robin bird-amico.png')}}" alt="Error al cargar la imagen">
@elseif ($red == "Instagram")
<img src="{{URL::asset('img/Playful cat-amico.png')}}" alt="Error al cargar la imagen">
@else
<img src="{{URL::asset('img/Cautious dog-cuate.png')}}" alt="Error al cargar la imagen">
@endif
</div>
</div>
@endsection
