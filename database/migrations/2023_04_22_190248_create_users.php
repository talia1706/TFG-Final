<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration

{

    /**
     * Run the migrations.
     */

    public function up(): void

    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 30);
            $table->enum('pais', ['España']);
            $table->enum('provincia', ['Almería', 'Cádiz', 'Córdoba', 'Granada', 'Huelva', 'Jaén', 'Málaga', 'Sevilla', 'Huesca', 'Teruel', 'Zaragoza', 'Asturias', 'Balears, Illes', 'Palmas, Las', 'Santa Cruz de Tenerife', 'Cantabria', 'Ávila', 'Burgos', 'León', 'Palencia', 'Salamanca', 'Segovia', 'Soria', 'Valladolid', 'Zamora', 'Albacete', 'Ciudad Real', 'Cuenca', 'Guadalajara', 'Toledo', 'Barcelona', 'Girona', 'Lleida', 'Tarragona', 'Alicante/Alacant', 'Castellón/Castelló', 'Valencia/València', 'Badajoz', 'Cáceres', 'Coruña, A', 'Lugo', 'Ourense', 'Pontevedra', 'Madrid', 'Murcia', 'Navarra', 'Araba/Álava', 'Bizkaia', 'Gipuzkoa', 'Rioja, La', 'Ceuta', 'Melilla']);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('rol');
            $table->foreign("rol")
                ->references("name")
                ->on("roles")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->string('imagen_perfil')->default('');
            $table->timestamps();
        });

    }



    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('users');
    }

};
