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
    return view('welcome');
});

Route::get('/hotels', [\App\Http\Controllers\HotelController::class, 'index'])->name('hotel.index');
Route::get('/hotels/create', [\App\Http\Controllers\HotelController::class, 'create'])->name('hotel.create');
Route::post('/hotels/store', [\App\Http\Controllers\HotelController::class, 'store'])->name('hotel.store');
Route::get('/hotels/show/{hotel}', [\App\Http\Controllers\HotelController::class, 'show'])->name('hotel.show');
Route::get('/hotels/edit/{hotel}', [\App\Http\Controllers\HotelController::class, 'edit'])->name('hotel.edit');
Route::put('/hotels/update/{hotel}', [\App\Http\Controllers\HotelController::class, 'update'])->name('hotel.update');
Route::delete('/hotels/destroy/{hotel}', [\App\Http\Controllers\HotelController::class, 'destroy'])->name('hotel.destroy');
