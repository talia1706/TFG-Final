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
        Schema::create('adopciones', function (Blueprint $table) {
            $table->id();
            $table->enum('estado', ['Revisando', 'Aceptada', 'Cancelada'])->default('Revisando');
            $table->unsignedBigInteger('id_anuncio');
            $table->foreign('id_anuncio')->references('id')->on('anuncios')->onDelete('cascade');
            $table->unsignedBigInteger('id_adoptante');
            $table->foreign('id_adoptante')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adopciones');
    }
};
