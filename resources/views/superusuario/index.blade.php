@extends('plantilla_superusuario')
@section('titulo', 'Página Inicio SuperUsuario')
@section('contenido')
 <div class="grid grid-cols-4 gap-4 mt-10 col-span-2" >
    <button>
        <p class="text-4xl">{{$usuarios_registrados}}</p>
        Usuarios registrados
    </button>
    <button>
        <p class="text-4xl">{{$animales_adoptar}}</p>
        Animales para adoptar
    </button>
    <button>
        <p class="text-4xl">{{$animales_adoptados}}</p>
        Animales adoptados
    </button>
    <button>
        <p class="text-4xl">{{$anuncios_revisar}}</p>
        Anuncios pendientes
    </button>
</div>
<div class="mx-auto w-1/4 mt-20">
<canvas id="myChart" style="width:100%;max-width:600px;" class="mt-10 "></canvas>
</div>

  <script>
    var xValues = ["Particulares", "Asociaciones", "Administradores"];
    var yValues = [{{$particulares}}, {{$asociaciones}}, {{$admins}}];
    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797"
    ];

    new Chart("myChart", {
      type: "pie",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
          text: "Tipos de usuarios registrados la página",
        },
      }
    });
    </script>
@endsection
