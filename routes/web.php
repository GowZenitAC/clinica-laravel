<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\CitaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PacienteController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::view('/inicio', 'inicio')->name('inicio');
// Route::view('/pacientes', 'pacientes.pacientes')->name('pacientes');
Route::resource('citas', CitaController::class)->middleware('auth');
Route::get('/pacFind', [CitaController::class, 'getPacientes'])->name('pacFind');
Route::resource('pacientes', PacienteController::class)->middleware('auth');
Route::resource('agenda', AgendaController::class)->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
