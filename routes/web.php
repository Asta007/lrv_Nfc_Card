<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ReseauController;
use App\Models\Clients;
use App\Models\Reseau;
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

Route::get('/User/{id}',[FrontController::class,'showinfo'])
    ->name('showinfo');
    
Route::prefix('Dash')->group(function(){

    // Route::get('/Clients/toggle/{id}',[ClientsController::class, 'toggle'])->name('Clients.toggle');
    
    Route::resource('Clients',ClientsController::class);
    Route::get('/Clients/toggle/{id}',[ClientsController::class, 'toggle'])->name('Clients.toggle');
    
    Route::resource('Compte',CompteController::class);
    Route::get('/Compte/toggle/{id}',[CompteController::class, 'toggle'])->name('Compte.toggle');
    
    Route::resource('Reseau',ReseauController::class);
    Route::get('/reseau/toggle/{id}',[ReseauController::class, 'toggle'])->name('Reseau.toggle');
});


