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

Route::get('/', [\App\Http\Controllers\BikeController::class, 'index'])->name('index');
Route::get('/show/{bike}', [\App\Http\Controllers\BikeController::class, 'show'])->name('show.bike');

Route::prefix('/admin')->group(function () {
    Route::get('/login', [\App\Http\Controllers\UserController::class, 'create'])->name('login');
    Route::post('/login', [\App\Http\Controllers\UserController::class, 'login']);

    Route::middleware('auth:web')->group(function () {
        Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('home');
        Route::post('logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');
        Route::resource('bikes', \App\Http\Controllers\BikeController::class);
    });
});
