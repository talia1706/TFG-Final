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
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->enum('estado', ['Revisando', 'Subido', 'Cancelado', 'Completo'])->default('Revisando');
            $table->unsignedBigInteger('id_anunciante');
            $table->foreign('id_anunciante')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_animal');
            $table->foreign('id_animal')->references('id')->on('animales')->onDelete('cascade');
            $table->integer('telefono');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncios');
    }
};
