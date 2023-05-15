<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use App\Models\Animal;

class SuperusuarioController extends Controller
{
    /* Consulta los conteos de los usuarios creados que sean tipo
    asociacion o particular, el conteo de los anuncios aceptados,
    el conteo de los anuncio completos, y el de los anuncios por
    revisar, también obtenemos un conteo individual por el número
    de cuentas creadas que hay para cada rol sin incluir el superusuario */
    public function index(){
       $usuarios_registrados = DB::table('users')
            ->where('rol', 'asociacion')
            ->orWhere('rol', 'particular')
            ->get()->count();


        $animales_adoptar = DB::table('anuncios')
        ->where('estado', 'Subido')
        ->get()->count();


        $animales_adoptados = DB::table('anuncios')
        ->where('estado', 'Completo')
        ->get()->count();


        $anuncios_revisar = DB::table('anuncios')
        ->where('estado', 'Revisando')
        ->get()->count();


        $particulares = DB::table('users')
        ->where('rol', 'particular')
        ->get()->count();

        $asociaciones = DB::table('users')
        ->where('rol', 'asociacion')
        ->get()->count();

        $admins = DB::table('users')
        ->where('rol', 'admin')
        ->get()->count();

        return view('superusuario.index', ['usuarios_registrados' => $usuarios_registrados, 'animales_adoptar' => $animales_adoptar,
        'animales_adoptados' => $animales_adoptados, 'anuncios_revisar' => $anuncios_revisar, 'particulares' => $particulares,
        'asociaciones' => $asociaciones, 'admins' => $admins,]);
    }


    /* Función que hace una consulta de todos los usuarios existentes para
    que el superusuario pueda verlos */
    public function ver_usuarios(){
        $usuarios_totales = DB::table('users')
        ->where('rol', 'asociacion')
        ->orWhere('rol', 'particular')
        ->orWhere('rol', 'admin')
        ->paginate(5);

        return view('superusuario.ver_usuarios', ['usuarios_totales' => $usuarios_totales
        ]);
    }



    /* Función que permite ver la información del usuario que tiene ese id en concreto */
    public function ver_usuario_id(Request $request){
        $id = $request['id'];
        $datos_usuario_id = User::find($id);
        return view('superusuario.ver_usuario_id')->with(compact('datos_usuario_id'));
    }


    /* Función que edita la información de ese usuario en concrto */
    public function editar_usuario_id(Request $request){
        $id = $request['id'];
        $datos_usuario_id = User::find($id);
        return view('superusuario.editar_usuario_id')->with(compact('datos_usuario_id'));
    }

    /* Para una vez editada, actualizar la información del usuario de ese id */
    public function actualizar_usuario(Request $request,$id){
        $datos_usuario_id = User::find($id);
        $datos_usuario_id->nombre = request('nombre');
        $datos_usuario_id->email = request('email');
        $datos_usuario_id->pais = request('pais');
        $datos_usuario_id->provincia = request('provincia');
        $datos_usuario_id->rol = request('rol');
        $datos_usuario_id->save();
        return view('superusuario.editar_usuario_id')->with(compact('datos_usuario_id'));
    }

    /* Para eliminar la cuenta del usuario que tenga ese id */
    public function eliminar_usuario_id(Request $request, $id){
        User::findOrFail($id)->delete();


        $usuarios_totales = DB::table('users')
        ->where('rol', 'asociacion')
        ->orWhere('rol', 'particular')
        ->orWhere('rol', 'admin')
        ->paginate(15);

        return redirect('/editar_usuarios');
    }


    /* Para añadir usuarios, retornamos a la vista con el formulario
    de crear nuevo usuario */
    public function anadir_usuario(){
        return view('superusuario.anadir_usuario');
    }


    /* Después de haber completado el formulario de añadir un nuevo usuario
    validamos campos y lo creamos */
    public function insertar_usuario(Request $request){
        $this->validate(request(),[
            'nombre'=>'required',
            'email'=>['required', 'unique:users'],
            'pais'=>'required',
            'provincia'=>'required',
            'rol'=>'required',
            'password'=>[
                'required',
                Password::min(8)->mixedCase()->numbers()->symbols()
            ],
        ]);

        $datos_usuario_id = new User();
        $datos_usuario_id->nombre = request('nombre');
        $datos_usuario_id->email = request('email');
        $datos_usuario_id->rol = request('rol');
        $datos_usuario_id->pais = request('pais');
        $datos_usuario_id->provincia = request('provincia');
        $datos_usuario_id->password = request('password');
        $datos_usuario_id->save();

        return redirect('/editar_usuarios');
    }





    /* Devuelve a la vista junto a los animales totales creados */
    public function ver_animales(){
        $animales_totales = DB::table('animales')
        ->paginate(5);

        return view('superusuario.ver_animales', ['animales_totales' => $animales_totales
        ]);
    }


    /* Devuelve el animal que corresponda a ese id */
     public function ver_animal_id(Request $request){
        $id = $request['id'];
        $datos_animal_id = Animal::find($id);
        return view('superusuario.ver_animal_id')->with(compact('datos_animal_id'));
    }


    /* Elimina el animal que tiene ese id */
    public function eliminar_animal_id(Request $request, $id){
        Animal::findOrFail($id)->delete();

        return redirect('/editar_animales');
    }




    /* Lleva a la vista para añadir animales */
    public function anadir_animal(){
        return view('superusuario.anadir_animal');
    }


    /* Verificamos campos y despues insertamos el animal */
    public function insertar_animal(Request $request){
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
            'condiciones_entrega'=>'required'
                ]);


        $file = $_FILES["imagen_perfil"]["name"];
        $url_temp = $_FILES["imagen_perfil"]["tmp_name"];
        $url_target = './pruebafotos/' . $file;
        move_uploaded_file($url_temp, $url_target);


       /*  $animal = Animal::create(request(['nombre','especie','urgente','sexo','fecha_nacimiento','edad','tamano','peso','nivel_actividad','imagen_perfil'=>$url_target,
        'descripcion','pais','provincia','estado_general','vacunado','enfermo','alergico','tratado','desparasitado','microchip','condiciones_entrega']));
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

        return redirect('/editar_animales');
    }



    /* Busca el animal con ese id y devuelve sus datos a la vista indicada */
    public function editar_animal_id(Request $request){
        $id = $request['id'];
        $datos_animal_id = Animal::find($id);
        return view('superusuario.editar_animal_id')->with(compact('datos_animal_id'));
    }

    /* Después de completar los cambios que se quieren editar en el animal se
    guardan */
    public function actualizar_animal(Request $request,$id){
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
        ]);


        $file = $_FILES["imagen_perfil"]["name"];
        $url_temp = $_FILES["imagen_perfil"]["tmp_name"];
        $url_target = './pruebafotos/' . $file;
        move_uploaded_file($url_temp, $url_target);


        $datos_animal_id = Animal::find($id);
        $datos_animal_id->nombre = request('nombre');
        $datos_animal_id->especie = request('especie');
        $datos_animal_id->urgente = request('urgente');
        $datos_animal_id->sexo = request('sexo');
        $datos_animal_id->fecha_nacimiento = request('fecha_nacimiento');
        $datos_animal_id->edad = request('edad');
        $datos_animal_id->tamano = request('tamano');
        $datos_animal_id->peso = request('peso');
        $datos_animal_id->nivel_actividad = request('nivel_actividad');
        $datos_animal_id->imagen_perfil = $url_target;
        $datos_animal_id->descripcion = request('descripcion');
        $datos_animal_id->pais = request('pais');
        $datos_animal_id->provincia = request('provincia');
        $datos_animal_id->estado_general = request('estado_general');
        $datos_animal_id->vacunado = request('vacunado');
        $datos_animal_id->enfermo = request('enfermo');
        $datos_animal_id->alergico = request('alergico');
        $datos_animal_id->tratado = request('tratado');
        $datos_animal_id->desparasitado = request('desparasitado');
        $datos_animal_id->microchip = request('microchip');
        $datos_animal_id->condiciones_entrega = request('condiciones_entrega');
        $datos_animal_id->save();
        return view('superusuario.editar_animal_id')->with(compact('datos_animal_id'));
    }

}


