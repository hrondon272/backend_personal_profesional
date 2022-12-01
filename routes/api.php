<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\PersonalProfesionalController;
use App\Http\Controllers\api\ProfesionController;
use App\Http\Controllers\api\VehiculoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Para iniciar sesión
Route::post('userLogin', [LoginController::class, 'login']);

// Para verificar el estado de la sesión
Route::get('checkSession', [LoginController::class, 'verifySession']);

// Para renderizar la vista en el caso de que no esté logueado quien intente hacer la petición
Route::get('login', [LoginController::class, 'index'])->name('login');

// Para la autenticación se utilizó sanctum, por medio de tokens
Route::middleware(['auth:sanctum'])->group(function () {

    // Obtener información
    Route::get('cargarProfesiones', [ProfesionController::class, 'load']);
    Route::get('cargarVehiculos', [VehiculoController::class, 'load']);
    Route::get('cargarPersonalProfesional', [PersonalProfesionalController::class, 'load']);

    // Aplicar cambios en la base de datos
    Route::post('registrarPersonalProfesional', [PersonalProfesionalController::class, 'store']);
    Route::put('actualizarPersonalProfesional', [PersonalProfesionalController::class, 'update']);
    Route::delete('eliminarPersonalProfesional', [PersonalProfesionalController::class, 'delete']);
    Route::post('userLogout', [LoginController::class, 'logout']);
});
