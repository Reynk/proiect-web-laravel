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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/db-test', function () {
    try {
        DB::connection()->getPdo();
        return "DB connection is working!";
    } catch (\Exception $e) {
        return "Could not connect to the DB: " . $e->getMessage();
    }
});

Route::get('/admin-usernames', function () {
    $usernames = DB::table('admins')->pluck('username');

    return $usernames;
});


Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');

Route::get('/adminPage', [App\Http\Controllers\AdminController::class, 'index'])->name('adminPage');
Route::get('/tickets', [App\Http\Controllers\EventsController::class, 'showEvents'])->name('tickets');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
Route::post('/createEvent', [App\Http\Controllers\EventsController::class, 'createEvent'])->name('createEvent');
Route::put('/updateEvent/{id}', [App\Http\Controllers\EventsController::class, 'update'])->name('updateEvent');

?>