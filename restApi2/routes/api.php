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
Route::post('/alumnos',[AlumnoController::class, 'create']);
Route::post('/alumnos',[AlumnoController::class, 'alumnosMasculinos']);
Route::post('/alumnos',[AlumnoController::class, 'alumnosFemeninos']);
Route::post('/alumnos',[AlumnoController::class, 'alumnosBecados']);
Route::post('/alumnos',[AlumnoController::class, 'alumnosSinBeca']);
Route::post('/alumnos',[AlumnoController::class, 'turnoMatutino']);
Route::post('/alumnos',[AlumnoController::class, 'turnoVespertino']);
Route::post('/alumnos',[AlumnoController::class, 'aprobados']);
Route::post('/alumnos',[AlumnoController::class, 'reprobados']);
Route::post('/alumnos',[AlumnoController::class, 'problemasDeSalud']);
Route::post('/alumnos',[AlumnoController::class, 'sinProblemasDeSalud']);
