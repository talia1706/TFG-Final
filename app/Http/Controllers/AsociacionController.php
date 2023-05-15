<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsociacionController extends Controller
{
    /* Este método se utiliza para realizar una consulta a las asociaciones existentes
     y así mostrarlas después */
    public function mostrar_protectoras(){
        $asociaciones = DB::table('users')
        ->select('*')
        ->where('rol','=','asociacion')
        ->orderBy('provincia', 'asc')
        ->paginate(15);
        return view('comun.mostrar_asociaciones', ['asociaciones' => $asociaciones]);
    }
}
