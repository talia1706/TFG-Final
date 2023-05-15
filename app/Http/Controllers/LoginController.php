<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    /* Función que retorna la vista del login */
    public function create(){
        return view('auth.login');
    }

    /* Función que devuelve un error si el correo y contraseña no son
    correctos, y que si al contrario, sí son correctos, redirige a la
    página principal de cada usuario */
    public function store(){
        if(auth()->attempt(request(['email','password']))==false){
            return back()->withErrors([
                'message'=>'El email o la contraseña son erroneos, por favor vuelve a introducirlos'
            ]);
        }else{
            if(auth()->user()->rol == 'superusuario'){
                return redirect()->route('superusuario.index');
            }
            else if(auth()->user()->rol == 'admin'){
                return redirect()->route('admin.index');
            }
            else{
                return redirect()->to('/');
            }
        }
    }

    /* Función que borra la sesión y redirige al inicio */
    public function destroy(){
        auth()->logout();

        return redirect()->to('/');
    }
}
