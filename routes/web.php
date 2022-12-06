<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Auth\LoginController;
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

Route:: get("/",[LoginController::class,'showLoginForm'])->name('login');

// Route::get('/owner', [OwnerController::class, 'index']);

// Route::get('/pet', [PetController::class, 'index']);

// Route::get('/reservation', [ReservationController::class, 'index']);

Route::middleware(['auth'])->group(function(){

    //Route::get('detailreservasi', [ReservationController::class, 'join'])->name('join');

    Route::prefix('owner')->group(function() {
        Route::get('/', [OwnerController::class, 'index'])->name('owner.index');
        Route::get('add', [OwnerController::class, 'create'])->name('owner.create');
        Route::post('store', [OwnerController::class, 'store'])->name('owner.store');
        Route::get('edit/{id}', [OwnerController::class, 'edit'])->name('owner.edit');
        Route::post('update/{id}', [OwnerController::class, 'update'])->name('owner.update');
        Route::post('delete/{id}', [OwnerController::class, 'delete'])->name('owner.delete');
    });
    
    Route::prefix('pet')->group(function() {
        Route::get('/', [PetController::class, 'index'])->name('pet.index');
        Route::get('add', [PetController::class, 'create'])->name('pet.create');
        Route::post('store', [PetController::class, 'store'])->name('pet.store');
        Route::get('edit/{id}', [PetController::class, 'edit'])->name('pet.edit');
        Route::post('update/{id}', [PetController::class, 'update'])->name('pet.update');
        Route::post('delete/{id}', [PetController::class, 'delete'])->name('pet.delete');
    });
    
    Route::prefix('reservation')->group(function() {
        Route::get('/', [ReservationController::class, 'index'])->name('reservation.index');
        Route::get('add', [ReservationController::class, 'create'])->name('reservation.create');
        Route::post('store', [ReservationController::class, 'store'])->name('reservation.store');
        Route::get('edit/{id}', [ReservationController::class, 'edit'])->name('reservation.edit');
        Route::post('update/{id}', [ReservationController::class, 'update'])->name('reservation.update');
        Route::post('delete/{id}', [ReservationController::class, 'delete'])->name('reservation.delete');
        Route::post('recycle/{id}', [reservationController::class, 'recycle'])->name('reservation.recycle');
        Route::get('restore/{id}', [reservationController::class, 'restore'])->name('reservation.restore');
    });
    
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

