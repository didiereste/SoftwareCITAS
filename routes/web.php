<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/ingresar', [AuthController::class, 'login'])->name('ingresar');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/registro', [AuthController::class, 'registro'])->name('registro');


Route::middleware(['auth'])->group(function () {

    //ruta home
    Route::get('/inicio', [HomeController::class, 'bienvenido'])->name('bienvenido');

    //rutas usuario
    Route::resource('/citas', CitaController::class);
    Route::post('/pedircita', [CitaController::class, 'pedircita'])->name('pedircita');
    Route::get('/miscitas', [ClienteController::class, 'miscitas'])->name('miscitas');

    //rutas admin
    Route::get('/gestioncitas', [AdminController::class, 'gestioncitas'])->name('gestioncitas');
    Route::put('/cambiarestado/{id}', [AdminController::class, 'cambiarestado'])->name('cambiarestado');
    Route::get('/usuarios', [AdminController::class, 'gestionusers'])->name('usuarios');
    Route::put('/usuarios/{id}', [AdminController::class, 'updateUser'])->name('update');
    Route::delete('/eliminar/{id}', [AdminController::class, 'deleteUser'])->name('eliminarUser');
    Route::get('/calendario', [AdminController::class, 'calendario'])->name('calendario');
});
