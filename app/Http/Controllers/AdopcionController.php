<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adopcion;
use App\Models\Anuncio;
use Illuminate\Support\Facades\DB;


class AdopcionController extends Controller
{
    public function insertar_adopcion(Request $request){
        $id_anuncio = $request['id_anuncio'];
        $id_adoptante = $request['id_adoptante'];

        $adopcion = new Adopcion;
        $adopcion->id_anuncio = $id_anuncio;
        $adopcion->id_adoptante = $id_adoptante;
        $adopcion->save();

        return redirect()->action(
            [AnuncioController::class, 'mostrar_anuncio_id'], ['id' => $id_anuncio]
        );
    }

    public function mostrar_actividad_anuncio_id(Request $request){
        $id = $request['id'];
        $anuncios_usuario = Anuncio::join("adopciones" ,"anuncios.id", "=", "adopciones.id_anuncio")
        ->join("users" ,"adopciones.id_adoptante", "=", "users.id")
        ->select("adopciones.estado", "adopciones.id_adoptante", "users.email","adopciones.id")
        ->where([
            ["adopciones.estado", "=", "Revisando"],
            ["anuncios.id", "=", $id]
        ])
        ->orderBy('anuncios.id', 'asc')
        ->paginate(5);

        return view('comun.mostrar_actividad_anuncio_id', ['anuncios_usuario' => $anuncios_usuario]);
    }

    public function denegar(Request $request){
        $id = $request['id'];

        $datos_anuncio_id = Adopcion::find($id);
        $datos_anuncio_id->estado = "Cancelada";
        $datos_anuncio_id->save();

        return redirect('/');
    }

    public function aceptar(Request $request){
        $id = $request['id'];


        $datos_adopcion_id = Adopcion::find($id);
        $datos_adopcion_id->estado = "Aceptada";
        $datos_adopcion_id->save();


        $id_anuncio_aceptado = DB::select('SELECT id_anuncio FROM adopciones WHERE id ='.$id);

        $completar_anuncio_id = Anuncio::find($id_anuncio_aceptado[0]->id_anuncio);
        $completar_anuncio_id->estado = "Completo";
        $completar_anuncio_id->save();

        return redirect('/');
    }

}
