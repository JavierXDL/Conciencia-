<?php

use Illuminate\Support\Facades\Route;

//agregar los controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\NuevoController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\RevisionController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\VistaController;
use App\Http\Controllers\FilesController;
use GuzzleHttp\Middleware;


Route::get('/', [VistaController::class, 'index'])->name('welcome');
 Route::get('/show/{articulo}', [VistaController::class, 'show'])->name('show');
 Route::get('/home', [HomeController::class, 'index'])->name('home');


Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('articulos', ArticuloController::class);
    Route::resource('revision', RevisionController::class);
    Route::resource('publicacion', PublicacionController::class);
    Route::resource('nuevos', NuevoController::class);
    Route::resource('supervisor', SupervisorController::class);
});

// Route::get('/', [FilesController::class,'loadView']);
// Route::post('/khe', [ArticuloController::class,'storeFile']);
// Route::get('/descargar/{name}', [FilesController::class,'downloadFile'])->name('dowload');