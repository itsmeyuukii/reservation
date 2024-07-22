<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//booking routes
Route::get('/book', [App\Http\Controllers\BookController::class, 'book'])->name('book');
Route::get('/reservations', [App\Http\Controllers\BookController::class, 'index'])->name('reservations');
Route::post('/reserve', [App\Http\Controllers\BookController::class, 'reserve'])->name('reserve');


//room routes
Route::get('/room', [App\Http\Controllers\RoomController::class, 'index'])->name('room');
Route::get('/add-room', [App\Http\Controllers\RoomController::class, 'create']);
Route::post('/save-room', [App\Http\Controllers\RoomController::class, 'store'])->name('save-room');
// route for testing JQuery
Route::get('/test-jquery', function () { return view('test-jquery');});
