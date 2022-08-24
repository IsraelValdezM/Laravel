<?php

use App\Http\Controllers\AlumnoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*Route::get('/empleados',[EmpleadoController::class, 'index']);
Route::post('/empleados',[EmpleadoController::class, 'create']);
Route::get('/empleados/{id}',[EmpleadoController::class, 'show']);
Route::put('/empleados/{id}',[EmpleadoController::class, 'edit']);
Route::delete('/empleados/{id}',[EmpleadoController::class, 'delete']);*/

Route::get('/alumnos',[AlumnoController::class, 'index']);
Route::post('/alumnos',[AlumnoController::class, 'create']);
Route::put('/alumnos/{id}',[AlumnoController::class, 'create']);
Route::post('/alumnos',[AlumnoController::class, 'create']);
Route::get('/alumnos',[AlumnoController::class, 'datos']);
Route::get('/datos',[AlumnoController::class,'datos']);
