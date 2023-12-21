<?php

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

Route::middleware(['web'])->group(function () {
    Route::get('/login', function () {
        return view('login');
    })->name('loginForm');
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::get('/adminPage', [App\Http\Controllers\AdminController::class, 'index'])->name('adminPage');
    Route::get('/tickets', [App\Http\Controllers\EventsController::class, 'showEvents'])->name('tickets');
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');
    Route::post('/createEvent', [App\Http\Controllers\EventsController::class, 'createEvent'])->name('createEvent');
    Route::put('/updateEvent/{id}', [App\Http\Controllers\EventsController::class, 'update'])->name('updateEvent');
    Route::delete('/event/{id}', [App\Http\Controllers\EventsController::class, 'deleteEvent'])->name('deleteEvent');
    Route::put('/event/{id}', [App\Http\Controllers\EventsController::class, 'updateEvent'])->name('updateEvent');
    Route::post('/register', [App\Http\Controllers\RegisterController::class, 'register'])->name('register');
    Route::get('/mainPage', function () {
        return view('mainPage');
    })->name('mainPage');
    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');
    // Route::get('/order', [App\Http\Controllers\OrderController::class, 'order'])->name('order');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });
})





?>