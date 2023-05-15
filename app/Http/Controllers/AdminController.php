<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Anuncio;

class AdminController extends Controller
{
    /* Hacemos 4 count: cada uno para obtener los anuncios dependiendo
    del estado. Luego los retornamos a la vista, así mostraremos un
    gráfico de los anuncios y sus estados */
    public function index(){
       $anuncios_subidos = DB::table('anuncios')
        ->where('estado', 'Subido')
        ->get()->count();

        $anuncios_cancelados = DB::table('anuncios')
        ->where('estado', 'Cancelado')
        ->get()->count();

        $anuncios_revision = DB::table('anuncios')
        ->where('estado', 'Revisando')
        ->get()->count();

        $anuncios_completados = DB::table('anuncios')
        ->where('estado', 'Completo')
        ->get()->count();

        return view('admin.ver_anuncios', ['anuncios_subidos' => $anuncios_subidos, 'anuncios_cancelados' => $anuncios_cancelados,
        'anuncios_revision' => $anuncios_revision, 'anuncios_completados' => $anuncios_completados]);
    }

    /* Enviamos a la vista los estados que están en revisión y necesitan
    ser revisados */
    public function revisar_anuncios(){
        $anuncios_totales = DB::table('anuncios')
        ->where('estado', 'Revisando')
        ->paginate(15);

        return view('admin.revisar_anuncios', ['anuncios_totales' => $anuncios_totales
        ]);
    }

    /* Retornamos a la vista los anuncios que tengan un estado distinto al Revisando,
    así conseguiremos que los administradores puedan ver los anuncios que ya han revisado */
    public function historial_anuncios(){
        $anuncios_totales = DB::table('anuncios')
        ->where('estado', 'Cancelado')
        ->orwhere('estado', 'Subido')
        ->orwhere('estado', 'Completo')
        ->paginate(15);

        return view('admin.historial_anuncios', ['anuncios_totales' => $anuncios_totales]);
    }

    /* Con esta consulta obtendremos todos los datos del anuncio con ese id, y enviaremos el
    resultado a la vista del anuncio_id */
    public function revisar_anuncio_id(Request $request){
        $id = $request['id'];
        $datos_anuncio_id = DB::select('SELECT U.nombre AS nombre_anunciante, U.pais AS pais_anunciante,
        U.provincia AS provincia_anunciante, U.email, U.rol,N.nombre, N.especie, N.urgente, N.sexo,
        N.fecha_nacimiento, N.edad, N.tamano, N.peso, N.nivel_actividad,N.imagen_perfil, N.descripcion,
        N.pais, N.provincia, N.estado_general, N.vacunado, N.enfermo,N.alergico, N.tratado, N.desparasitado,
        N.microchip, N.condiciones_entrega, A.id, A.id_anunciante, A.id_animal, A.estado, A.telefono
        FROM Anuncios A, Users U, Animales N WHERE A.id ='.intval($id).' AND U.id = A.id_anunciante AND N.id = A.id_animal;');
        /* $datos_anuncio_id = Anuncio::find($id); */

        return view('admin.revisar_anuncio_id')->with(compact('datos_anuncio_id'));
    }

    /* Esta función se ejecutará cuando el admin seleccione el botón Aceptar, entonces
    el anuncio se subirá, y con ello su estado cambiará a ser Subido */
    public function aceptar_anuncio_id(Request $request){
        $id = $request['id'];
        $datos_anuncio_id = Anuncio::find($id);
        $datos_anuncio_id->estado = "Subido";
        $datos_anuncio_id->save();

        $datos_anuncio_id = DB::select('SELECT U.nombre AS nombre_anunciante, U.pais AS pais_anunciante, U.provincia AS provincia_anunciante, U.email, U.rol,
        N.nombre, N.especie, N.urgente, N.sexo, N.fecha_nacimiento, N.edad, N.tamano, N.peso, N.nivel_actividad,
        N.imagen_perfil, N.descripcion, N.pais, N.provincia, N.estado_general, N.vacunado, N.enfermo,
        N.alergico, N.tratado, N.desparasitado, N.microchip, N.condiciones_entrega, A.id, A.id_anunciante,
        A.id_animal, A.estado, A.telefono FROM Anuncios A, Users U, Animales N WHERE A.id ='.$id);

        return redirect('/revisar_anuncios');
    }

    /* Esta función se ejecutará cuando el admin seleccione el botón Denegar, entonces
    el anuncio se subirá, y con ello su estado cambiará a ser Cancelado */
    public function denegar_anuncio_id(Request $request){
        $id = $request['id'];
        $datos_anuncio_id = Anuncio::find($id);
        $datos_anuncio_id->estado = "Cancelado";
        $datos_anuncio_id->save();

        $datos_anuncio_id = DB::select('SELECT U.nombre AS nombre_anunciante, U.pais AS pais_anunciante, U.provincia AS provincia_anunciante, U.email, U.rol,
        N.nombre, N.especie, N.urgente, N.sexo, N.fecha_nacimiento, N.edad, N.tamano, N.peso, N.nivel_actividad,
        N.imagen_perfil, N.descripcion, N.pais, N.provincia, N.estado_general, N.vacunado, N.enfermo,
        N.alergico, N.tratado, N.desparasitado, N.microchip, N.condiciones_entrega, A.id, A.id_anunciante,
        A.id_animal, A.estado, A.telefono FROM Anuncios A, Users U, Animales N WHERE A.id ='.$id);

        return redirect('/revisar_anuncios');
    }

}
