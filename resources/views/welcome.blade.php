@extends('plantilla')
@section('titulo', 'Pagina Principal')
@section('contenido')
<p>Pagina Principal</p>
@role('asociacion')
<p>solo lo ve la asociacion</p>
@endrole

@role('particular')
<p>solo lo ve la particular</p>
@endrole

@role('admin')
<p>solo lo ve el admin</p>
@endrole

@role('superusuario')
<p>solo lo ve el superusuario</p>
@endrole
@endsection
