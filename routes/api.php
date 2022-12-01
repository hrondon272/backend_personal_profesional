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

Route::post('userLogin', [LoginController::class, 'login']);
Route::get('checkSession', [LoginController::class, 'verifySession']);
Route::get('login', [LoginController::class, 'index'])->name('login');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('cargarProfesiones', [ProfesionController::class, 'load']);
    Route::get('cargarVehiculos', [VehiculoController::class, 'load']);
    Route::get('cargarPersonalProfesional', [PersonalProfesionalController::class, 'load']);
    Route::put('actualizarPersonalProfesional', [PersonalProfesionalController::class, 'update']);
    Route::delete('eliminarPersonalProfesional', [PersonalProfesionalController::class, 'delete']);
    Route::post('userLogout', [LoginController::class, 'logout']);
});
