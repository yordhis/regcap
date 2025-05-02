<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ChequeoController,
    ComensaleController,
    UserController,
    DashboardController,
    EntradaController,
    ProfesoreController,
    EstudianteController,
    LoginController,
    PageController,
    PersonController,
    RecepcionController,
    ReporteController,
    RepresentanteController,
    ServicioController,
};


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'index'])->name('home.index');
Route::post('/registrar/en/paginia', [PersonController::class, 'storePublic'])->name('person.store.public');



Route::get('/login', [LoginController::class, 'index'])->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::resource('/login', LoginController::class)->names('login')->middleware('guest');

/** 
 * Todas las rutas estan protegidas por los midd:
 * @method auth
 * @method validarRol
 * 
 * los roles y permisos se configuran en los seeders generando relaciones automaticas 
 * a la hora de desplegar el proyecto.
 */

Route::middleware('auth', 'validarRol')->group(function () {
    /** Tablero estadistico */
    Route::get('/panel', [DashboardController::class, 'index'])->name('admin.panel.index');

    /** Tablero estadistico */
    Route::get('/registros', [PersonController::class, 'index'])->name('admin.person.index');
    Route::post('/registros', [PersonController::class, 'store'])->name('admin.person.store');
    Route::get('/registros/{id}', [PersonController::class, 'show'])->name('admin.person.show');
    Route::put('/registros/{id}', [PersonController::class, 'update'])->name('admin.person.update');
    Route::delete('/registros/{id}', [PersonController::class, 'destroy'])->name('admin.person.destroy');

    /** Reportes de particiapacion de votos */
    Route::resource('/reportes', ReporteController::class)->names('admin.reportes');

    /** Rutas de controlador usuarios */
    Route::resource('/users', UserController::class)->names('admin.users');
 
});