@extends('plantilla_superusuario')
@section('titulo', 'Página Editar Usuario SuperUsuario')
@section('contenido')
<?php
$json = file_get_contents(__DIR__."\\rows.json");
$array_provincias = json_decode($json, true);
?>
<div class="relative overflow-x-auto sm:rounded-lg w-2/4 mx-auto">
    <p class="mx-auto text-center text-2xl m-10 font-semibold bg-[#FFDEB4] text-gray-900 uppercase rounded-full p-5 w-2/4 border-4 border-zinc-200">Editando los datos del animal {{$datos_animal_id->id}}</p>
    <form action="{{route('superusuario.actualizar_animal', $datos_animal_id['id'])}}" id="form" novalidate enctype="multipart/form-data" method="POST">
        @csrf
        <div class="relative z-0 w-full mt-2">
            <input
            value="<?php echo $datos_animal_id['nombre']?>"
            type="text"
            name="nombre"
            placeholder=" "
            required
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
            />
            <label for="Nombre" class="duration-300 top-3 -z-1 origin-0 text-gray-500">Introduce el nombre del animal</label>
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
                <option value="{{$datos_animal_id['especie']}}" selected>{{$datos_animal_id['especie']}}</option>
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
                @if ($datos_animal_id['urgente'] == "si")
                    <input checked type = "radio" name = "urgente" value = "si" /> Sí
                    <input type = "radio" name = "urgente" value = "no" /> No
                @else
                    <input type = "radio" name = "urgente" value = "si" /> Sí
                    <input checked type = "radio" name = "urgente" value = "no" /> No
                @endif
            </div>
            @error('urgente')
            <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
            @enderror

            <fieldset class="relative z-0 w-full p-px mb-10 mt-10">
            <legend class="absolute text-gray-500 transform scale-75 -top-3 origin-0">Sexo</legend>
            <div class="block pt-3 pb-2 space-x-4">
                @if ($datos_animal_id['sexo'] == "macho")
                <label>
                    <input checked
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
                @else
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
                    <input checked
                        type="radio"
                        name="sexo"
                        value="hembra"
                        class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black"
                    />
                    Hembra
                    </label>
                @endif

            </div>
            </fieldset>
            @error('sexo')
            <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
            @enderror

        <div class="relative z-0 w-full mb-5 mt-10">
        <input
            value="<?php echo $datos_animal_id['fecha_nacimiento']?>"
            type="date"
            name="fecha_nacimiento"
            placeholder=" "
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
        />
        <label for="fecha_nacimiento" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Introduce tu fecha de nacimiento</label>
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
            <option value="{{$datos_animal_id['edad']}}" selected >{{$datos_animal_id['edad']}}</option>
            <option value="cachorro">Cachorro</option>
            <option value="joven">Joven</option>
            <option value="adulto">Adulto</option>
            <option value="senior">Senior</option>
            </select>
            <label for="select" class="duration-300 top-3 -z-1 origin-0 text-gray-500">Selecciona la edad</label>
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
            <option value="{{$datos_animal_id['tamano']}}" selected>{{$datos_animal_id['tamano']}}</option>
            <option value="pequeno">Pequeño</option>
            <option value="mediano">Mediano</option>
            <option value="grande">Grande</option>
            </select>
            <label for="select" class="duration-300 top-3 -z-1 origin-0 text-gray-500">Selecciona el tamaño</label>
        </div>
        @error('tamano')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror
        <div class="relative z-0 w-full mb-5 mt-10">
            <input value="<?php echo $datos_animal_id['peso']?>"
            type="number"
            name="peso"
            step="any"
            placeholder=" "
            required
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
            />
            <label for="peso" class="duration-300 top-3 -z-1 origin-0 text-gray-500">Introduce el peso del animal</label>
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
            <option value="{{$datos_animal_id['nivel_actividad']}}" selected>{{$datos_animal_id['nivel_actividad']}}</option>
            <option value="baja">Baja</option>
            <option value="media">Media</option>
            <option value="alta">Alta</option>
            </select>
            <label for="select" class="duration-300 top-3 -z-1 origin-0 text-gray-500">Selecciona el nivel de actividad</label>
        </div>
        @error('nivel_actividad')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror
        <fieldset class="relative z-0 w-full p-px mb-5 mt-10">
        <legend class="absolute text-gray-500 transform scale-75 -top-3 origin-0 text-2xl">Escoge una foto de perfil del animal</legend>
        <div class="relative z-0 w-full mb-7 mt-8">
        <input max id="imagen_perfil" name="imagen_perfil" accept="image/*" multiple type="file" width="100" height="100">
        </div>
        @error('imagen_perfil')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror
        <fieldset class="relative z-0 w-full p-px mb-5 mt-10">
        <legend class="absolute text-gray-500 transform scale-75 -top-3 origin-0 text-2xl">Introduce una descripción del animal y su comportamiento</legend>
        <div class="relative z-0 w-full mb-7 mt-8">
        <textarea class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black mt-5" id="descripcion" name="descripcion" rows="6" cols="65">
        {{$datos_animal_id['descripcion']}}
        </textarea>
        </div>
        </fieldset>
        @error('descripcion')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror

        <p class="text-2xl text-emerald-500 font-bold">Localización</p>

        <div class="relative z-0 w-full mb-5 mt-10">
        <select name="pais" id="pais" class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
            <option value="España" selected>España</option>
        </select>
        <label for="select" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Selecciona el país</label>
        </div>
        @error('pais')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror

        <div class="relative z-0 w-full mb-5 mt-10">
        <select name="provincia" id="provincia" class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
            <option value="{{$datos_animal_id['provincia']}}" selected>{{$datos_animal_id['provincia']}}</option>;
            @foreach ($array_provincias as $value)
                <option value="{{$value['label']}}">{{$value['label']}}</option>
            @endforeach
        </select>
        <label for="select" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Selecciona la provincia</label>
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
            @if ($datos_animal_id['estado_general'] == "sano")
                <option value="sano" selected>Sano</option>
                <option value="insano">Insano</option>
            @else
                <option value="sano">Sano</option>
                <option value="insano" selected>Insano</option>
            @endif
            </select>
            <label for="select" class=" duration-300 top-3 -z-1 origin-0 text-gray-500">Selecciona el estado general en el que se encuentra el animal</label>
    </div>
    @error('estado_general')
    <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
    @enderror
        <fieldset class="relative z-0 w-full p-px mb-10 mt-10">
        <legend class="text-2xl absolute text-gray-500 transform scale-75 -top-6 origin-0">¿El animal está vacunado?</legend>
        <div class="block pt-3 pb-2 space-x-4">
            @if ($datos_animal_id['vacunado'] == "si")
                <input type = "radio" name = "vacunado"  value="si"  checked> Si
                <input type = "radio" name = "vacunado" value="no" > No
            @else
                <input type = "radio" name = "vacunado" value="si" > Si
                <input type = "radio" name = "vacunado" value="no" checked> No
            @endif
        </div>
        </fieldset>
        @error('vacunado')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror
        <fieldset class="relative z-0 w-full p-px mb-10 mt-10">
        <legend class="text-2xl absolute text-gray-500 transform scale-75 -top-6 origin-0">¿El animal está enfermo?</legend>
        <div class="block pt-3 pb-2 space-x-4">
            @if ($datos_animal_id['enfermo'] == "si")
            <input type = "radio" name = "enfermo" value = "si" checked /> Sí
            <input type = "radio" name = "enfermo" value = "no" /> No
            @else
            <input type = "radio" name = "enfermo" value = "si" /> Sí
            <input type = "radio" name = "enfermo" value = "no" checked /> No
            @endif
        </div>
        @error('enfermo')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror
        </fieldset>
        <fieldset class="relative z-0 w-full p-px mb-10 mt-10">
        <legend class="text-2xl absolute text-gray-500 transform scale-75 -top-6 origin-0">¿El animal es alérgico?</legend>
        <div class="block pt-3 pb-2 space-x-4">
            @if ($datos_animal_id['alergico'] == "si")
            <input type = "radio" name = "alergico" value = "si" checked /> Sí
            <input type = "radio" name = "alergico" value = "no" /> No
            @else
            <input type = "radio" name = "alergico" value = "si" /> Sí
            <input type = "radio" name = "alergico" value = "no" checked /> No
            @endif
        </div>
        @error('alergico')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror
        </fieldset>
        <fieldset class="relative z-0 w-full p-px mb-10 mt-10">
        <legend class="text-2xl absolute text-gray-500 transform scale-75 -top-6 origin-0">¿El animal está en tratamiento?</legend>
        <div class="block pt-3 pb-2 space-x-4">
            @if ($datos_animal_id['tratado'] == "si")
            <input type = "radio" name = "tratado" value = "si" checked /> Sí
            <input type = "radio" name = "tratado" value = "no" /> No
            @else
            <input type = "radio" name = "tratado" value = "si" /> Sí
            <input type = "radio" name = "tratado" value = "no" checked /> No
            @endif
        </div>
        @error('tratado')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror
        </fieldset>
        <fieldset class="relative z-0 w-full p-px mb-10 mt-10">
        <legend class="text-2xl absolute text-gray-500 transform scale-75 -top-6 origin-0">¿El animal está desparasitado?</legend>
        <div class="block pt-3 pb-2 space-x-4">
            @if ($datos_animal_id['desparasitado'] == "si")
            <input type = "radio" name = "desparasitado" value = "si" checked /> Sí
            <input type = "radio" name = "desparasitado" value = "no" /> No
            @else
            <input type = "radio" name = "desparasitado" value = "si" /> Sí
            <input type = "radio" name = "desparasitado" value = "no" checked /> No
            @endif
        </div>
        @error('desparasitado')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror
        </fieldset>
        <fieldset class="relative z-0 w-full p-px mb-10 mt-10">
        <legend class="text-2xl absolute text-gray-500 transform scale-75 -top-6 origin-0">¿El animal tiene microchip?</legend>
        <div class="block pt-3 pb-2 space-x-4">
            @if ($datos_animal_id['microchip'] == "si")
            <input type = "radio" name = "microchip" value = "si" checked /> Sí
            <input type = "radio" name = "microchip" value = "no" /> No
            @else
            <input type = "radio" name = "microchip" value = "si" /> Sí
            <input type = "radio" name = "microchip" value = "no" checked /> No
            @endif
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
                <option value="{{$datos_animal_id['condiciones_entrega']}}" selected>{{$datos_animal_id['condiciones_entrega']}}</option>
                <option value="consultar">Consultar</option>
                <option value="acepta transportar">Acepta transportar</option>
                <option value="acepta recoger">Acepta recoger</option>
                <option value="acepta recoger y transportar">Acepta recoger y transportar</option>
            </select>
            <label for="select" class="duration-300 top-3 -z-1 origin-0 text-gray-500">Selecciona las condiciones de entrega</label>
        </div>
        @error('condiciones_entrega')
        <p class="border-1 rounded-full border-red-700 grid place-items-center bg-red-500 text-white  mb-4 mt-2">{{$message}}</p>
        @enderror
        <button type="submit" class="block mx-auto w-2/3 bg-green-700 mt-4 py-2 rounded-2xl text-white font-semibold mb-3">Modificar animal</button>
        </form>
</div>
@endsection
