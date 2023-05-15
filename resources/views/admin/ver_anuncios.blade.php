@extends('plantilla')
@section('titulo', 'Administrar anuncios')
@section('contenido')
{{-- Añadimos dos enlaces para que de forma rápida los admins puedan
    revisar los anuncios y ver el historial. Mostramos un gráfico de
    los anuncios y sus 4 estados --}}
<div class="mt-20 flex justify-center space-x-12">
    <button>
        <a href="{{route('admin.revisar_anuncios')}}"  class="mr-4 border-2 border-transparent text-white bg-green-700 hover:border-1 hover:border-white  hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-lg px-6 py-4 text-center inline-flex items-center">
            Anuncios por revisar
            <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </a>
    </button>
    <button>
        <a href="{{route('admin.historial_anuncios')}}"  class="mr-4 border-2 border-transparent text-white bg-green-700 hover:border-1 hover:border-white  hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-lg px-6 py-4 text-center inline-flex items-center">
            Historial de Anuncios
            <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </a>
    </button>
</div>
<div class="mt-20 flex justify-center space-x-16">
<canvas id="myChart" style="width:100%;max-width:700px"></canvas>
</div>

<script>
    var xValues = ["Subido", "Cancelado", "Revisando", "Completado"];
    var yValues = [{{$anuncios_subidos}}, {{$anuncios_cancelados}}, {{$anuncios_revision}}, {{$anuncios_completados}}];
    var barColors = ["red", "green","blue","orange"];

    new Chart("myChart", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        title: {
          display: true,
          text: "Anuncios Animalia"
        }
      }
    });
    </script>
@endsection
