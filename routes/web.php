<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RangeController;
use App\Http\Controllers\OrderController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/malo', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('malo');
//Route::get('/range', [RangeController::class, 'index'])->middleware('auth')->name('range');


Route::get('/gerente/index', [HomeController::class, 'index'])
    ->middleware('auth')
    ->name('gerente.dashboard');

// Ruta para la Cocina
Route::get('/cocina/index', function () {
    // Retorna la vista: resources/views/cocina/index.blade.php
    return view('cocina.index');
})->middleware('auth')->name('cocina.dashboard');

// Ruta para el Mesero
Route::get('/mesero/index', function () {
    // Retorna la vista: resources/views/mesero/index.blade.php
    return view('mesero.index');
})->middleware('auth')->name('mesero.dashboard');

Route::get('/gerente/malo', function () {
    // Retorna la vista: resources/views/mesero/index.blade.php
    return view('gerente.malo');
})->middleware('auth')->name('gerente.malo');


//Aqui tenemos el edit para el gerente de los usuario para asignarle rangos
Route::get('users/{user}/edit', [HomeController::class, 'edit'])
    ->middleware('auth')
    ->name('users.edit'); 


Route::put('users/{user}', [HomeController::class, 'update'])
    ->middleware('auth')
    ->name('users.update');



    Route::get('users/{user}', [HomeController::class, 'show'])
    ->middleware('auth')
    ->name('users.show');


    Route::delete('users/{user}', [HomeController::class, 'destroy'])
    ->middleware('auth')
    ->name('users.destroy');

Route::resource('order', OrderController::class);


Route::get('/cocina/index', [OrderController::class, 'index'])
    ->middleware('auth')
    ->name('cocina.dashboard');