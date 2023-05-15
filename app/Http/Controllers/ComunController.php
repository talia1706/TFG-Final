<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;


class ComunController extends Controller
{
    /* Haremos una consulta buscando los datos del usuario con ese id para
    que en la sección Mi perfil pueda ver sus datos personales. Si el id que
    está en una url no es el suyo, se le retornará a inicio. */
    public function consulta_id(Request $request){
        $id = $request['id'];
        if($id == auth()->user()->id){
            $datos_usuario_id = User::find($id);
            return view('comun.cuenta')->with(compact('datos_usuario_id'));
        }
        else{
            return redirect()->to('/');
        }
    }

    /* Actualizaremos la información del perfil del usuario desde aquí, todos
    los campos serán necesarios */
    public function update(Request $request, $id){
        $this->validate(request(),[
            'nombre'=>'required',
            'email'=>'required',
            'pais'=>'required',
            'provincia'=>'required',
        ]);


        $file = $_FILES["imagen_perfil"]["name"];
        $url_temp = $_FILES["imagen_perfil"]["tmp_name"];
        $url_target = './pruebafotos/' . $file;
        move_uploaded_file($url_temp, $url_target);

        $datos_usuario_id = User::find($id);
        $datos_usuario_id->nombre = request('nombre');
        $datos_usuario_id->email = request('email');
        $datos_usuario_id->pais = request('pais');
        $datos_usuario_id->provincia = request('provincia');
        if($url_target!='./pruebafotos/'){
            $datos_usuario_id->imagen_perfil=$url_target;
        }
        $datos_usuario_id->save();
        return view('comun.cuenta')->with(compact('datos_usuario_id'));
    }



    public function error_red(Request $request){
        $red = $request['red'];
        return view('comun.error_redsocial')->with(compact('red'));
    }

}
