<?php
use App\Http\Controllers\SaludoController;
use App\Http\Controllers\OperacionesController;
use App\Http\Controllers\TablasDeMultiplicar;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\DocenteController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get("ini/",[SaludoController::class,'inicio']);

Route::get('/mayuscula/{nombre}',[SaludoController::class,'Saludo']);

Route::get('/comparar/{nombre1}/{nombre2}/',[SaludoController::class,'comparar']);

Route::get('/operacion/{num1}/{op}/{num2}/',[OperacionesController::class,'Operaciones']);

Route::get('/tablas',[TablasDeMultiplicar::class,'tablas']);

Route::get('/tablas/{numero}/',[TablasDeMultiplicar::class,'tablaPersonalizada']);

Route::get('/calcular-edad/{nombre}/{anyo_nac}/',[SaludoController::class,'CalcularEdad']);

Route::get('/comparanombres/{nombre1}/{nombre2}', [SaludoController::class, 'ComparaNombres']);

Route::get('/alumno/create', [AlumnoController::class, 'create']);
Route::post('/alumno/insert', [AlumnoController::class, 'insert']);
Route::get('/alumno/list', [AlumnoController::class, 'list']);
Route::get('/alumno/delete/{carnet}',[AlumnoController::class, 'delete']);
Route::get('/alumno/edit/{carnet}',[AlumnoController::class, 'edit']);
Route::patch('/alumno/update/{carnet}',[AlumnoController::class, 'update']);

Route::get('/Docente/create', [DocenteController::class, 'create']);
Route::post('/Docente/insert', [DocenteController::class, 'insert']);
Route::get('/Docente/list', [DocenteController::class, 'list']);
Route::get('/Docente/delete/{carnet}',[DocenteController::class, 'delete']);
Route::get('/Docente/edit/{carnet}',[DocenteController::class, 'edit']);
Route::patch('/Docente/update/{carnet}',[DocenteController::class, 'update']);