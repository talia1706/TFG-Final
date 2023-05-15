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
        Schema::create('animales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 30);
            $table->enum('especie', ['Perro', 'Gato', 'Conejo', 'Caballo', 'Huron', 'Coballa', 'Raton', 'Pájaro']);
            $table->enum('urgente', ['si', 'no']);
            $table->enum('sexo', ['Macho', 'Hembra']);
            $table->date('fecha_nacimiento');
            $table->enum('edad', ['Cachorro', 'Joven', 'Adulto', 'Senior']);
            $table->enum('tamano', ['Pequeño', 'Mediano', 'Grande']);
            $table->decimal('peso', 8, 2);
            $table->enum('nivel_actividad', ['Baja', 'Media', 'Alta']);
            $table->string('imagen_perfil');
            $table->string('descripcion');
            $table->enum('pais', ['España']);
            $table->enum('provincia', ['Almería', 'Cádiz', 'Córdoba', 'Granada', 'Huelva', 'Jaén', 'Málaga', 'Sevilla', 'Huesca', 'Teruel', 'Zaragoza', 'Asturias', 'Balears, Illes', 'Palmas, Las', 'Santa Cruz de Tenerife', 'Cantabria', 'Ávila', 'Burgos', 'León', 'Palencia', 'Salamanca', 'Segovia', 'Soria', 'Valladolid', 'Zamora', 'Albacete', 'Ciudad Real', 'Cuenca', 'Guadalajara', 'Toledo', 'Barcelona', 'Girona', 'Lleida', 'Tarragona', 'Alicante/Alacant', 'Castellón/Castelló', 'Valencia/València', 'Badajoz', 'Cáceres', 'Coruña, A', 'Lugo', 'Ourense', 'Pontevedra', 'Madrid', 'Murcia', 'Navarra', 'Araba/Álava', 'Bizkaia', 'Gipuzkoa', 'Rioja, La', 'Ceuta', 'Melilla']);
            $table->enum('estado_general',['Sano', 'Insano']);
            $table->enum('vacunado', ['si', 'no']);
            $table->enum('enfermo', ['si', 'no']);
            $table->enum('alergico', ['si', 'no']);
            $table->enum('tratado', ['si', 'no']);
            $table->enum('desparasitado', ['si', 'no']);
            $table->enum('microchip', ['si', 'no']);
            $table->enum('condiciones_entrega', ['Consultar', 'Acepta transportar', 'Acepta recoger', 'Acepta recoger y transportar']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animales');
    }
};
