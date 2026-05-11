<?php

use App\Http\Controllers\Administrador\UsuariosController;
use App\Http\Controllers\Generales\DashboardController;
use App\Http\Controllers\Generales\LoginController;
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

Route::GET('/loginm', [LoginController::class, 'index'])->name('login');
Route::POST('/logearse', [LoginController::class, 'newlogin'])->name('logearse');


Route::GET('/login', [LoginController::class, 'retornarVista'])->name('login');          //Ruta a la pagina de login
Route::POST('/logout', [LoginController::class, 'logout'])->name('LogOut');  //Ruta cuando cerramos la sesión
Route::POST('/IniciarSesion', [LoginController::class, 'login'])->name('IniciarSesion');  //Ruta cuando se insertan las credenciales 

Route::controller(DashboardController::class)->group(function () {
    Route::middleware('auth', 'prohibirRetroceso')->group(function () {
        Route::GET('/Dashboard', 'index')->name('index');  //Ruta para retornar la pantalla principal
    });
});

//Usuarios
Route::GET('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');                       //Ruta para retornar la pantalla principal

// Landing Page
Route::view('/', 'Landing.index')->name('home');
Route::view('/whyus', 'Landing.whyus')->name('whyus');
Route::view('/services', 'Landing.services')->name('services');
Route::view('/team', 'Landing.team')->name('team');
Route::view('/pricing', 'Landing.pricing')->name('pricing');
Route::view('/solutions', 'Landing.solutions')->name('solutions');