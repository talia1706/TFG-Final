<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;


class AnuncioController extends Controller
{

    /* Este método lo usaremos para validar los campos del anuncio, y guardar
    el anuncio en la tabla Anuncios. */
    public function store(){
        $this->validate(request(),[
            'nombre'=>'required',
            'especie'=>'required',
            'urgente'=>'required',
            'sexo'=>'required',
            'fecha_nacimiento'=>'required',
            'edad'=>'required',
            'tamano'=>'required',
            'peso'=>'required',
            'nivel_actividad'=>'required',
            'imagen_perfil'=>'required',
            'descripcion'=>'required',
            'pais'=>'required',
            'provincia'=>'required',
            'estado_general'=>'required',
            'vacunado'=>'required',
            'enfermo'=>'required',
            'alergico'=>'required',
            'tratado'=>'required',
            'desparasitado'=>'required',
            'microchip'=>'required',
            'condiciones_entrega'=>'required',
            'telefono'=>'required',
        ]);


        $file = $_FILES["imagen_perfil"]["name"];
        $url_temp = $_FILES["imagen_perfil"]["tmp_name"];
        $url_target = './pruebafotos/' . $file;
        move_uploaded_file($url_temp, $url_target);


/*         $animal = Animal::create(request(['nombre','especie','urgente','sexo','fecha_nacimiento','edad','tamano','peso','nivel_actividad',$url_target,'descripcion','pais','provincia','estado_general','vacunado','enfermo','alergico','tratado','desparasitado','microchip','condiciones_entrega']));
 */
        $animal = new Animal;
        $animal->nombre = request('nombre');
        $animal->especie = request('especie');
        $animal->urgente = request('urgente');
        $animal->sexo = request('sexo');
        $animal->fecha_nacimiento = request('fecha_nacimiento');
        $animal->edad = request('edad');
        $animal->tamano = request('tamano');
        $animal->peso = request('peso');
        $animal->nivel_actividad = request('nivel_actividad');
        $animal->imagen_perfil = $url_target;
        $animal->descripcion = request('descripcion');
        $animal->pais = request('pais');
        $animal->provincia = request('provincia');
        $animal->estado_general = request('estado_general');
        $animal->vacunado = request('vacunado');
        $animal->enfermo = request('enfermo');
        $animal->alergico = request('alergico');
        $animal->tratado = request('tratado');
        $animal->desparasitado = request('desparasitado');
        $animal->microchip = request('microchip');
        $animal->condiciones_entrega = request('condiciones_entrega');
        $animal->save();

        $anuncio = new Anuncio;
        $anuncio->id_anunciante = request('id_anunciante');
        $anuncio->id_animal = $animal['id'];
        $anuncio->telefono = request('telefono');
        $anuncio->save();


        /* $anuncio = Anuncio::create(request([$animal->id, auth()->user()->id])); */

        return redirect()->to('/');
    }


    /* Enviaremos los datos del usuario con ese id a la vista anunciar, ya que así luego
    podremos insertarlos en la tabla anuncios, posteriormente a completar el anuncio */
    public function anunciar_animales(){
        $datos_usuario_id = User::find(auth()->user()->id);
        return view('comun.anunciar')->with(compact('datos_usuario_id'));
    }

    /* Haremos una consulta de los anuncios que ya tengan el estado Subido, y seleccionaremos
    los campos que nos interesen para que luego en la vista de anuncios se puedan ver */
    public function mostrar_anuncios(){
        $anuncios_totales = Anuncio::join("animales", "anuncios.id_animal", "=", "animales.id")
        ->join("users" ,"anuncios.id_anunciante", "=", "users.id")
        ->select("users.nombre", "users.rol", "animales.nombre", "animales.especie", "animales.urgente",
        "animales.sexo", "animales.fecha_nacimiento", "animales.edad", "animales.tamano", "animales.peso",
        "animales.nivel_actividad", "animales.imagen_perfil", "animales.descripcion", "animales.pais",
        "animales.provincia", "animales.estado_general", "animales.vacunado", "animales.enfermo",
        "animales.alergico", "animales.tratado", "animales.desparasitado", "animales.microchip",
        "animales.condiciones_entrega", "anuncios.estado", "anuncios.telefono", "anuncios.id")
        ->where("anuncios.estado", "=", "Subido")
        ->paginate(8);

        return view('comun.anuncios', ['anuncios_totales' => $anuncios_totales]);
    }

    /* Buscaremos los datos de ese anuncio con el id, para que cuando se clicke a un anuncio, podamos
    visualizar el anuncio perteneciente a ese id */
    public function mostrar_anuncio_id(Request $request){
        $id = $request['id'];
        $anuncio_id = Anuncio::join("animales", "anuncios.id_animal", "=", "animales.id")
        ->join("users" ,"anuncios.id_anunciante", "=", "users.id")
        ->select("users.nombre", "users.rol", "animales.nombre", "animales.especie", "animales.urgente",
        "animales.sexo", "animales.fecha_nacimiento", "animales.edad", "animales.tamano", "animales.peso",
        "animales.nivel_actividad", "animales.imagen_perfil", "animales.descripcion", "animales.pais",
        "animales.provincia", "animales.estado_general", "animales.vacunado", "animales.enfermo",
        "animales.alergico", "animales.tratado", "animales.desparasitado", "animales.microchip",
        "animales.condiciones_entrega", "anuncios.id" ,"anuncios.estado",  "anuncios.id_anunciante", "anuncios.telefono")
        ->where("anuncios.id", "=", $id)->paginate(15);

        return view('comun.mostrar_anuncio_id', ['anuncio_id' => $anuncio_id]);
    }

    public function mostrar_anuncios_usuario(Request $request){
        $id = $request['id'];
        $anuncios_usuario = Anuncio::join("animales", "anuncios.id_animal", "=", "animales.id")
        ->join("users" ,"anuncios.id_anunciante", "=", "users.id")
        ->select("users.nombre", "users.rol", "animales.nombre", "animales.especie", "animales.urgente",
        "animales.sexo", "animales.fecha_nacimiento", "animales.edad", "animales.tamano", "animales.peso",
        "animales.nivel_actividad", "animales.imagen_perfil", "animales.descripcion", "animales.pais",
        "animales.provincia", "animales.estado_general", "animales.vacunado", "animales.enfermo",
        "animales.alergico", "animales.tratado", "animales.desparasitado", "animales.microchip",
        "animales.condiciones_entrega", "anuncios.estado", "anuncios.telefono", "anuncios.id")
        ->where([
            ["anuncios.estado", "=", "Subido"],
            ["anuncios.id_anunciante", "=", $id]
        ])
        ->paginate(15);

        return view('comun.mostrar_anuncios_usuario', ['anuncios_usuario' => $anuncios_usuario]);
    }

}
