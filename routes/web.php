<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\RentalController;
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

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/car', 'cars')->name('cars');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerPost');
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginPost');
    Route::post('/logout', 'logout')->name('logout');

    Route::get('profile')->name('profile')->middleware('auth');
});

Route::controller(BrandController::class)->name('brands.')->group(function () {
    Route::get('/brands', 'index')->name('index');
    Route::get('/brands/{brand}/show', 'show')->name('show');
    Route::get('/brands/create', 'create')->name('create');
    Route::post('/brands', 'store');
    Route::get('/brands/{brand}/edit', 'edit')->name('edit');
    Route::put('/brands/{brand}/update', 'update');
    Route::delete('/brands/{brand}', 'destroy');
});

Route::controller(CarsController::class)->name('cars.')->group(function () {
    Route::get('/cars', 'index')->name('index');
    Route::get('/cars/{car}/show', 'show')->name('show');
    Route::get('/cars/create', 'create')->name('create');
    Route::post('/cars', 'store');
    Route::get('/cars/{car}/edit', 'edit')->name('edit');
    Route::put('/cars/{car}/update', 'update');
    Route::delete('/cars/{car}', 'destroy');
});

Route::controller(RentalController::class)->name('booking.')->group(function () {
    Route::get('/booking', 'index')->name('index');
    Route::get('/booking/{car}', 'show')->name('show');
    Route::get('/booking/create', 'create')->name('create');
    Route::post('/booking', 'store');
    Route::get('/booking/{car}/edit', 'edit')->name('edit');
    Route::put('/booking/{car}/update', 'update');
    Route::delete('/booking/{car}', 'destroy');
});
