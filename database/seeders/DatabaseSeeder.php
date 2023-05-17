<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    /* Cada vez que se haga un db:seed se insertará directamente
    el superusuario */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user = new User;
        $user->nombre = 'Superusuario';
        $user->email = 'taliaidanez@gmail.com';
        $user->pais = 'España';
        $user->provincia = 'Huelva';
        $user->password = '1234';
        $user->rol = 'superusuario';
        $user->imagen_perfil = './img/superusuario_imagen_perfil.jpg';
        $user->save();
        $user->syncRoles($user->rol);
    }


}
