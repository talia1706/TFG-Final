<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules\Password;

class RegistroController extends Controller
{
    /* Función que devuelve la vista registro */
    public function create(){
        return view('auth.registro');
    }

    /* Crea el usuario si los campos están completos, el correo
    es único, y la contraseña cuenta con mínimo 8 caracteres,
    mayúsculas y minúsculas, números y símbolos */
    public function store(){

        $this->validate(request(),[
            'nombre'=>'required',
            'email'=>['required', 'unique:users'],
            'pais'=>'required',
            'provincia'=>'required',
            'rol'=>'required',
            'password'=>[
                'required',
                'confirmed',
                Password::min(8)->mixedCase()->numbers()->symbols()
            ],
        ]);


        $user = User::create(request(['nombre','email','pais','provincia', 'rol','password']));

        $roles = request()->input('rol',[]);
        $user->syncRoles($roles);

        auth()->login($user);
        return redirect()->to('/');
    }


}
