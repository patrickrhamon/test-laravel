<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
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
    return view('welcome');
});

Route::prefix('hotels')->group(function () {
    Route::name('hotel.')->group(function () {
        Route::get('/', [HotelController::class, 'index'])->name('index');
        Route::get('/create', [HotelController::class, 'create'])->name('create');
        Route::post('/store', [HotelController::class, 'store'])->name('store');
        Route::get('/show/{hotel}', [HotelController::class, 'show'])->name('show');
        Route::get('/edit/{hotel}', [HotelController::class, 'edit'])->name('edit');
        Route::put('/update/{hotel}', [HotelController::class, 'update'])->name('update');
        Route::delete('/destroy/{hotel}', [HotelController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/{hotel}/rooms')->group(function () {
        Route::name('room.')->group(function () {
            Route::get('/', [RoomController::class, 'index'])->name('index');
            Route::get('/create', [RoomController::class, 'create'])->name('create');
            Route::post('/store', [RoomController::class, 'store'])->name('store');
            Route::get('/show/{room}', [RoomController::class, 'show'])->name('show');
            Route::get('/edit/{room}', [RoomController::class, 'edit'])->name('edit');
            Route::put('/update/{room}', [RoomController::class, 'update'])->name('update');
            Route::delete('/destroy/{room}', [RoomController::class, 'destroy'])->name('destroy');
        });
    });
});
