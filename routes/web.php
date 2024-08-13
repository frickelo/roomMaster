<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Materia_espacioController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::group(['middleware' => ['permission:create_facultad|edit_facultad|delete_facultad|view_facultad']], function () {
    Route::resource('facultads', App\Http\Controllers\FacultadController::class);
//});



Route::resource('carreras', App\Http\Controllers\CarreraController::class);


Route::resource('cursos', App\Http\Controllers\CursoController::class);


Route::resource('materias', App\Http\Controllers\MateriaController::class);


Route::resource('espacios', App\Http\Controllers\EspacioController::class);


    Route::resource('materiaEspacios', App\Http\Controllers\Materia_espacioController::class);




Route::resource('users', App\Http\Controllers\UserController::class);

Route::get('/get-espacios/{materia}', [Materia_espacioController::class, 'getEspacios']);


Route::resource('materiaEspaciosAudits', App\Http\Controllers\materia_espacios_auditController::class);
