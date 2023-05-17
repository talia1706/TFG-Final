<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperusuarioController;
use App\Http\Controllers\ComunController;
use App\Http\Controllers\AsociacionController;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\AdopcionController;

/* MÉTODOS GUEST */

Route::get('/registro', [RegistroController::class, 'create'])->name('registro.index')->middleware('guest');

Route::get('/login', [LoginController::class, 'create'])->name('login.index')->middleware('guest');

/* MÉTODOS SIN AUTH */

Route::get('/', [AnuncioController::class, 'mostrar_anuncios'])->name('inicio');

/* MÉTODOS AUTH */

Route::get('/anuncio/{id}', [AnuncioController::class, 'mostrar_anuncio_id'])->name('comun.mostrar_anuncio_id')->middleware('auth');

Route::post('/registro', [RegistroController::class, 'store'])->name('registro.store');

Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy')->middleware('auth');

Route::get('/usuarios/{id}', [ComunController::class, 'consulta_id'])->name('comun.consulta_id')->middleware('auth');


 Route::get('/anunciar', [AnuncioController::class, 'anunciar_animales'])->name('comun.anunciar')->middleware('auth');

 Route::get('/mostrar_protectoras', [AsociacionController::class, 'mostrar_protectoras'])->name('asociacion.mostrar_protectoras')->middleware('auth');


 Route::post('/anunciar', [AnuncioController::class, 'store']);

 Route::post('/usuarios/{id}', [ComunController::class, 'update'])->name('comun.actualizardatos')->where(['id'=>'[0-9]+']);


 Route::get('/error/{red}', [ComunController::class, 'error_red'])->name('comun.error_redsocial');

 Route::get('/insertar_adopcion/{id_anuncio}/{id_adoptante}', [AdopcionController::class, 'insertar_adopcion'])->name('adopcion.insertar_adopcion');

 Route::get('/mostrar_anuncios_usuario/{id}', [AnuncioController::class, 'mostrar_anuncios_usuario'])->name('anuncio.mostrar_anuncios_usuario');

 Route::get('/eliminar_anuncio/{id}', [AnuncioController::class, 'eliminar_anuncio_id'])->name('anuncio.eliminar_anuncio_id');

 Route::get('/mostrar_actividad_anuncio_id/{id}', [AdopcionController::class, 'mostrar_actividad_anuncio_id'])->name('adopcion.mostrar_actividad_anuncio_id');


 Route::get('/denegar_adopcion/{id}', [AdopcionController::class, 'denegar'])->name('adopcion.denegar');

 Route::get('/aceptar_adopcion/{id}', [AdopcionController::class, 'aceptar'])->name('adopcion.aceptar');


 /* ADMIN FUNCIONES */

 Route::middleware('auth.admin')->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/revisar_anuncios', [AdminController::class, 'revisar_anuncios'])->name('admin.revisar_anuncios');

    Route::get('/historial_anuncios', [AdminController::class, 'historial_anuncios'])->name('admin.historial_anuncios');

    Route::get('/revisar_anuncio_id/{id}', [AdminController::class, 'revisar_anuncio_id'])->name('admin.revisar_anuncio_id');

    Route::get('/aceptar_anuncio_id/{id}', [AdminController::class, 'aceptar_anuncio_id'])->name('admin.aceptar');

    Route::get('/denegar_anuncio_id/{id}', [AdminController::class, 'denegar_anuncio_id'])->name('admin.denegar');
});


/* SUPERUSUARIO FUNCIONES */

Route::middleware('auth.superusuario')->group(function(){
    Route::get('/eliminar_usuario/{id}', [SuperusuarioController::class, 'eliminar_usuario_id'])->name('superusuario.eliminar_usuario_id');

    Route::get('/anadir_usuario', [SuperusuarioController::class, 'anadir_usuario'])->name('superusuario.anadir_usuario');

    Route::post('/insertar_usuario', [SuperusuarioController::class, 'insertar_usuario'])->name('superusuario.insertar_usuario');

    Route::get('/ver_animal/{id}', [SuperusuarioController::class, 'ver_animal_id'])->name('superusuario.ver_animal_id');

    Route::get('/eliminar_animal/{id}', [SuperusuarioController::class, 'eliminar_animal_id'])->name('superusuario.eliminar_animal_id');

    Route::get('/anadir_animal', [SuperusuarioController::class, 'anadir_animal'])->name('superusuario.anadir_animal');

    Route::post('/insertar_animal', [SuperusuarioController::class, 'insertar_animal'])->name('superusuario.insertar_animal');

    Route::get('/editar_animal/{id}', [SuperusuarioController::class, 'editar_animal_id'])->name('superusuario.editar_animal_id');

    Route::post('/actualizar_animal/{id}', [SuperusuarioController::class, 'actualizar_animal'])->name('superusuario.actualizar_animal');

    Route::get('/superusuario', [SuperusuarioController::class, 'index'])->name('superusuario.index');

    Route::get('/editar_usuarios', [SuperusuarioController::class, 'ver_usuarios'])->name('superusuario.ver_usuarios');


    Route::get('/editar_animales', [SuperusuarioController::class, 'ver_animales'])->name('superusuario.ver_animales');

    Route::get('/ver_usuario/{id}', [SuperusuarioController::class, 'ver_usuario_id'])->name('superusuario.ver_usuario_id');

    Route::get('/editar_usuario/{id}', [SuperusuarioController::class, 'editar_usuario_id'])->name('superusuario.editar_usuario_id');

    Route::post('/actualizar_usuario/{id}', [SuperusuarioController::class, 'actualizar_usuario'])->name('superusuario.actualizar_usuario');



});
