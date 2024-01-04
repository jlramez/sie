<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});
Auth::routes(["register" => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/docs/{id}', [App\Http\Controllers\DocumentController::class, 'details'])
->name('documents.detail');
Route::get('/amps/{id}', [App\Http\Controllers\DocumentController::class, 'details_amparos'])
->name('amparos.detail');
Route::get('/cedula/pdf/{promocion}', [App\Http\Controllers\CedulaController::class, 'pdf'])->name('cedula.pdf');

//Route Hooks - Do not delete//
	Route::view('asignadocs/{id}', 'livewire.asignadocumentos.index')->name('asignadocumentos.index')->middleware('auth');
	Route::view('tipodocumentos', 'livewire.tipodocumentos.index')->middleware('auth');
	Route::view('ptipos', 'livewire.ptipos.index')->middleware('auth');
	Route::view('empleados', 'livewire.empleados.index')->name('empleados.index')->middleware('auth');
	Route::view('promociones', 'livewire.promociones.index')->name('promociones.index')->middleware('auth');
	Route::view('etapas', 'livewire.etapas.index')->name('etapas.index')->middleware('auth');
	Route::view('tareas', 'livewire.tareas.index')->name('tareas.index')->middleware('auth');
	Route::view('estados', 'livewire.estados.index')->name('estados.index')->middleware('auth');
	Route::view('juzgados', 'livewire.juzgados.index')->name('juzgados.index')->middleware('auth');
	Route::view('amtipos', 'livewire.amtipos.index')->name('amptipos.index')->middleware('auth');
	Route::view('amparos', 'livewire.amparos.index')->name('amparos.index')->middleware('auth');
	Route::view('showamparos/ordinarios/{exp}', 'livewire.showamparos.ordinarios.index')->name('show.ordinarios.amparos')->middleware('auth');
	Route::view('especiales', 'livewire.especiales.index')->name('especiales.index')->middleware('auth');
	Route::view('paraprocesales', 'livewire.paraprocesales.index')->name('empleados.index')->middleware('auth');
	Route::view('ordinarios', 'livewire.ordinarios.index')->name('ordinarios.index')->middleware('auth');
	Route::view('tipos', 'livewire.tipos.index')->name('tipos.index')->middleware('auth');
	Route::view('estatus', 'livewire.estatus.index')->name('estatus.index')->middleware('auth');
	Route::view('ponencias', 'livewire.ponencias.index')->name('ponencias.index')->middleware('auth');
	Route::view('expedientes', 'livewire.expedientes.index')->name('expedientes.index')->middleware('auth');
	Route::view('actuaciones', 'livewire.actuaciones.index')->name('actuaciones.index')->middleware('auth');
	Route::view('roles', 'livewire.roles.index')->middleware('auth');
	Route::view('permissions', 'livewire.permissions.index')->middleware('auth');
	Route::view('users', 'livewire.users.index')->middleware('auth');