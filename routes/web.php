<?php

use App\Http\Controllers\Administrador\UsuariosController;
use App\Http\Controllers\Administrador\DentistasController;
use App\Http\Controllers\Administrador\RecepcionistasController;
use App\Http\Controllers\Generales\DashboardController;
use App\Http\Controllers\Generales\LoginController;
use App\Http\Controllers\Recepcion\PacientesController;
use App\Http\Controllers\Recepcion\CitasController;
use App\Http\Controllers\Clinica\HistorialesController;
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

Route::GET('/login', [LoginController::class, 'retornarVista'])->name('login');          //Ruta a la pagina de login
Route::any('/logout', [LoginController::class, 'logout'])->name('logout');  //Ruta cuando cerramos la sesión
Route::POST('/IniciarSesion', [LoginController::class, 'login'])->name('IniciarSesion');  //Ruta cuando se insertan las credenciales 

Route::middleware(['auth', 'prohibirRetroceso'])->group(function () {
    Route::get('/Dashboard', [DashboardController::class, 'index'])->name('index');

    // Admin
    Route::middleware('role:admin')->group(function () {
        Route::resource('usuarios', UsuariosController::class)->except(['show']);
        Route::resource('dentistas', DentistasController::class)->except(['show']);
        Route::resource('recepcionistas', RecepcionistasController::class)->except(['show']);
    });

    // Recepción (admin y recepcionista)
    Route::middleware('role:admin,recepcionista')->group(function () {
        Route::resource('pacientes', PacientesController::class)->except(['show']);
        Route::resource('citas', CitasController::class)->except(['show']);
    });

    // Clínica (admin y dentista)
    Route::middleware('role:admin,dentista')->group(function () {
        Route::resource('historiales', HistorialesController::class)->except(['show']);
    });
});

// Landing Page
Route::view('/', 'landing_page.index')->name('home');
Route::view('/whyus', 'landing_page.whyus')->name('whyus');
Route::view('/services', 'landing_page.service')->name('services');
Route::view('/team', 'landing_page.team')->name('team');
Route::view('/pricing', 'landing_page.pricing')->name('pricing');
Route::view('/solutions', 'landing_page.solutions')->name('solutions');