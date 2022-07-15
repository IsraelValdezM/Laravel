<?php

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

Route::post('/alumnos',[AlumnoController::class, 'index']);
Route::post('/alumnos/create',[AlumnoController::class, 'create']);
Route::post('/alumnos/masculinos',[AlumnoController::class, 'alumnosMasculinos']);
Route::post('/alumnos/femeninos',[AlumnoController::class, 'alumnosFemeninos']);
Route::post('/alumnos/becados',[AlumnoController::class, 'alumnosBecados']);
Route::post('/alumnos/nobecados',[AlumnoController::class, 'alumnosSinBeca']);
Route::post('/alumnos/matutino',[AlumnoController::class, 'turnoMatutino']);
Route::post('/alumnos/vespertino',[AlumnoController::class, 'turnoVespertino']);
Route::post('/alumnos/aprobados',[AlumnoController::class, 'aprobados']);
Route::post('/alumnos/reprobados',[AlumnoController::class, 'reprobados']);
Route::post('/alumnos/problemas',[AlumnoController::class, 'problemasDeSalud']);
Route::post('/alumnos/sanos',[AlumnoController::class, 'sinProblemasDeSalud']);
