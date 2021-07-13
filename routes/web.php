<?php

use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\MateriaController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('estudiante', EstudianteController::class);

Route::resource('materia', MateriaController::class)->parameters([
    'materia' => 'materia'

]);

Route::post('estudiante/{estudiante}/add-materia',[EstudianteController::class, 'addMateria'])->name('estudiante.add-materia');