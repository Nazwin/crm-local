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
    return view('welcome');
});

Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.auth');

Route::middleware(['auth'])->group(function () {
    Route::resource('projects', \App\Http\Controllers\ProjectController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('tasks', \App\Http\Controllers\TaskController::class);
    Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('location', [\App\Http\Controllers\UserController::class, 'location']);
});



