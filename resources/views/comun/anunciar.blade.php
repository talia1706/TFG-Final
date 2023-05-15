@extends('plantilla')
@section('titulo', 'Anunciar')
@section('contenido')
<?php
    $json = file_get_contents(__DIR__."\\rows.json");
    $array_provincias = json_decode($json, true);
?>
{{-- Añadimos el formulario de adopción y un botón para anunciar el animal --}}
<div class="min-h-screen p-0 sm:p-12 pb-10">
    <h1 class="text-3xl font-bold px-8 py-7 text-center ">Formulario para Dar en Adopción</h1>

    <div class="DivFormAnunciar">
      <form action="" id="form" novalidate enctype="multipart/form-data" method="POST">
        @csrf
        <div>
        <p class="text-2xl text-emerald-500 font-bold pb-4">Datos del Animal</p>
        <div class="relative z-0 w-full mt-2">
          <input
            value="{{ old('nombre') }}"
            type="text"
            name="nombre"
            placeholder=" "
            required
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
          />
          <label for="Nombre" class=" duration-300 top-3 -z-1 origin-0 text-gray-500">Introduce el nombre del animal</label>
        </div>
        @error('nombre')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white mt-4">{{$message}}</p>
        @enderror

        <div class="relative z-0 w-full mb-15 mt-10">
            <select
              name="especie"
              value=""
              class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
            >
              <option value="" selected disabled hidden></option>
              <option value="perro">Perro</option>
              <option value="gato">Gato</option>
              <option value="conejo">Conejo</option>
              <option value="caballo">Caballo</option>
              <option value="huron">Hurón</option>
              <option value="coballa">Coballa</option>
              <option value="raton">Ratón</option>
              <option value="pajaro">Pájaro</option>
            </select>
            <label for="select" class="duration-300 top-3 -z-1 origin-0 text-gray-500">Selecciona la especie</label>
          </div>
          @error('especie')
          <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-4">{{$message}}</p>
          @enderror
          <div class="relative z-0 w-full mb-36 mt-16">
          <label class="absolute text-gray-500 transform scale-75 -top-3 origin-0 text-2xl">¿La adopción es de estado urgente?
            <input type = "radio" name = "urgente" value = "si" /> Sí
            <input type = "radio" name = "urgente" value = "no" /> No
          </div>
          @error('urgente')
          <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
          @enderror

          <fieldset class="relative z-0 w-full p-px mb-10 mt-10">
            <legend class="absolute text-gray-500 transform scale-75 -top-3 origin-0">Sexo</legend>
            <div class="block pt-3 pb-2 space-x-4">
              <label>
                <input
                  type="radio"
                  name="sexo"
                  value="macho"
                  class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black"
                />
                Macho
              </label>
              <label>
                <input
                  type="radio"
                  name="sexo"
                  value="hembra"
                  class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black"
                />
                Hembra
              </label>
            </div>
          </fieldset>
          @error('sexo')
          <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
          @enderror

        <div class="relative z-0 w-full mb-5 mt-10">
        <input
            type="date"
            name="fecha_nacimiento"
            placeholder=" "
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
        />
        <label for="fecha_nacimiento" class=" duration-300 top-3 -z-1 origin-0 text-gray-500">Introduce la fecha de nacimiento</label>
        </div>
        @error('fecha_nacimiento')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror
        <div class="relative z-0 w-full mb-7 mt-10">
          <select
            name="edad"
            value=""
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
          >
            <option value="" selected disabled hidden></option>
            <option value="cachorro">Cachorro</option>
            <option value="joven">Joven</option>
            <option value="adulto">Adulto</option>
            <option value="senior">Senior</option>
          </select>
          <label for="select" class=" duration-300 top-3 -z-1 origin-0 text-gray-500">Selecciona la edad</label>
        </div>

        @error('edad')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror

        <div class="relative z-0 w-full mb-7 mt-10">
          <select
            name="tamano"
            value=""
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
          >
            <option value="" selected disabled hidden></option>
            <option value="pequeno">Pequeño</option>
            <option value="mediano">Mediano</option>
            <option value="grande">Grande</option>
          </select>
          <label for="select" class=" duration-300 top-3 -z-1 origin-0 text-gray-500">Selecciona el tamaño</label>
        </div>
        @error('tamano')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror
        <div class="relative z-0 w-full mb-5 mt-10">
          <input
            type="number"
            name="peso"
            step="any"
            placeholder=" "
            required
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
          />
          <label for="peso" class=" duration-300 top-3 -z-1 origin-0 text-gray-500">Introduce el peso del animal</label>
        </div>
        @error('peso')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror
        <div class="relative z-0 w-full mb-7 mt-10">
          <select
            name="nivel_actividad"
            value=""
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
          >
            <option value="" selected disabled hidden></option>
            <option value="baja">Baja</option>
            <option value="media">Media</option>
            <option value="alta">Alta</option>
          </select>
          <label for="select" class=" duration-300 top-3 -z-1 origin-0 text-gray-500">Selecciona el nivel de actividad</label>
        </div>
        @error('nivel_actividad')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror
        <fieldset class="relative z-0 w-full p-px mb-5 mt-10">
        <legend class="absolute text-gray-500 transform scale-75 -top-3 origin-0 text-2xl">Escoge una foto de perfil del animal</legend>
        <div class="relative z-0 w-full mb-7 mt-8">
        <input max id="imagen_perfil" name="imagen_perfil" accept="image/*" multiple type="file" width="100" height="100" class="mt-10">
        </div>
        @error('imagen_perfil')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror
        <fieldset class="relative z-0 w-full p-px mb-5 mt-10">
        <legend class="absolute text-gray-500 transform scale-75 -top-3 origin-0 text-2xl">Introduce una descripción del animal y su comportamiento</legend>
        <div class="relative z-0 w-full mb-7 mt-8">
        <textarea class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black mt-10" id="descripcion" name="descripcion" rows="6" cols="30">
        </textarea>
        </div>
        </fieldset>
        @error('descripcion')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror

      <p class="text-2xl text-emerald-500 font-bold">Localización</p>

      <div class="relative z-0 w-full mb-5 mt-10">
        <select name="pais" id="pais" class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
            <option value="España">España</option>
        </select>
        <label for="select" class=" duration-300 top-3 -z-1 origin-0 text-gray-500">Selecciona el país</label>
        </div>
        @error('pais')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror

        <div class="relative z-0 w-full mb-5 mt-10">
        <select name="provincia" id="provincia" class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
            <option value="{{$datos_usuario_id['provincia']}}" selected>{{$datos_usuario_id['provincia']}}</option>
            @foreach ($array_provincias as $value)
                <option value="{{$value['label']}}">{{$value['label']}}</option>
            @endforeach
        </select>
        <label for="select" class=" duration-300 top-3 -z-1 origin-0 text-gray-500">Selecciona la provincia</label>
        </div>
        @error('provincia')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror

        <p class="text-2xl text-emerald-500 font-bold pb-5 pt-7 mt-10">Estado del animal</p>
        <div class="relative z-0 w-full mb-10">
            <select
              name="estado_general"
              value=""
              class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
            >
              <option value="" selected disabled hidden></option>
              <option value="sano">Sano</option>
              <option value="insano">Insano</option>
            </select>
            <label for="select" class=" duration-300 top-3 -z-1 origin-0 text-gray-500">Selecciona el estado general en el que se encuentra el animal</label>
    </div>
    @error('estado_general')
    <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
    @enderror
        <fieldset class="relative z-0 w-full p-px mb-10 mt-10">
        <legend class="text-2xl absolute text-gray-500 transform scale-75 -top-6 origin-0">¿El animal está vacunado?</legend>
        <div class="block pt-3 pb-2 space-x-4">
            <input type = "radio" name = "vacunado" value = "si" /> Sí
            <input type = "radio" name = "vacunado" value = "no" /> No
        </div>
        </fieldset>
        @error('vacunado')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror
        <fieldset class="relative z-0 w-full p-px mb-10 mt-10">
        <legend class="text-2xl absolute text-gray-500 transform scale-75 -top-6 origin-0">¿El animal está enfermo?</legend>
        <div class="block pt-3 pb-2 space-x-4">
            <input type = "radio" name = "enfermo" value = "si" /> Sí
            <input type = "radio" name = "enfermo" value = "no" /> No
        </div>
        @error('enfermo')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror
      </fieldset>
        <fieldset class="relative z-0 w-full p-px mb-10 mt-10">
        <legend class="text-2xl absolute text-gray-500 transform scale-75 -top-6 origin-0">¿El animal es alérgico?</legend>
        <div class="block pt-3 pb-2 space-x-4">
            <input type = "radio" name = "alergico" value = "si" /> Sí
            <input type = "radio" name = "alergico" value = "no" /> No
        </div>
        @error('alergico')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror
        </fieldset>
        <fieldset class="relative z-0 w-full p-px mb-10 mt-10">
        <legend class="text-2xl absolute text-gray-500 transform scale-75 -top-6 origin-0">¿El animal está en tratamiento?</legend>
        <div class="block pt-3 pb-2 space-x-4">
            <input type = "radio" name = "tratado" value = "si" /> Sí
            <input type = "radio" name = "tratado" value = "no" /> No
        </div>
        @error('tratado')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror
        </fieldset>
        <fieldset class="relative z-0 w-full p-px mb-10 mt-10">
        <legend class="text-2xl absolute text-gray-500 transform scale-75 -top-6 origin-0">¿El animal está desparasitado?</legend>
        <div class="block pt-3 pb-2 space-x-4">
            <input type = "radio" name = "desparasitado" value = "si" /> Sí
            <input type = "radio" name = "desparasitado" value = "no" /> No
        </div>
        @error('desparasitado')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror
        </fieldset>
        <fieldset class="relative z-0 w-full p-px mb-10 mt-10">
        <legend class="text-2xl absolute text-gray-500 transform scale-75 -top-6 origin-0">¿El animal tiene microchip?</legend>
        <div class="block pt-3 pb-2 space-x-4">
            <input type = "radio" name = "microchip" value = "si" /> Sí
            <input type = "radio" name = "microchip" value = "no" /> No
        </div>
        @error('microchip')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror
        </fieldset>
        <p class="text-2xl text-emerald-500 font-bold">Condiciones de entrega</p>
        <div class="relative z-0 w-full mb-6 mt-5">
            <select
              name="condiciones_entrega"
              value=""
              class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
            >
              <option value="" selected disabled hidden></option>
              <option value="consultar">Consultar</option>
              <option value="acepta transportar">Acepta transportar</option>
              <option value="acepta recoger">Acepta recoger</option>
              <option value="acepta recoger y transportar">Acepta recoger y transportar</option>
            </select>
            <label for="select" class=" duration-300 top-3 -z-1 origin-0 text-gray-500">Selecciona las condiciones de entrega</label>
        </div>
        @error('condiciones_entrega')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror
        <div class="relative z-0 w-full mb-10 mt-10">
        <label class=" duration-300 top-3 -z-1 origin-0 text-gray-500" for="telefono">Introduce tu número de teléfono para que puedan contactar contigo:</label>
        <input class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200" type="tel" id="telefono" name="telefono" pattern="[0-9]{9}" required>
    </div>
        @error('telefono')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white mb-4 mt-2">{{$message}}</p>
        @enderror
        <button
          id="button"
          type="submit"
          class="w-full px-6 py-3 mt-3 text-lg text-white  transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-green-500 hover:bg-green

          -600 hover:shadow-lg focus:outline-none"
        >
          Anunciar Animal
        </button>
        <input type="hidden" name="id_anunciante" value="{{$datos_usuario_id['id']}}">
      </form>
    </div>
</div>


@endsection
