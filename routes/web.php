<?php

use App\Http\Controllers\ArbitroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeportistaController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\SugerenciaController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [LoginController::class, 'showLoginForm'])->name('loginView');

Route::get('reporte', [ReporteController::class, 'index'])->name('admin.reporte');

Route::resource('user', UserController::class)->middleware('auth')->names('admin.user');

Route::resource('deportista', DeportistaController::class)->middleware('auth')->names('admin.deportista');

Route::resource('arbitro', ArbitroController::class)->middleware('auth')->names('admin.arbitro');

Route::resource('equipo', EquipoController::class)->middleware('auth')->names('admin.equipo');

Route::resource('sugerencia', SugerenciaController::class)->except(['edit', 'update'])->middleware('auth')->names('admin.sugerencia');

Route::resource('partido', PartidoController::class)->middleware('auth')->names('admin.partido');

Auth::routes();
