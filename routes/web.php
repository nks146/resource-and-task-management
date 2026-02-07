<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;


Route::get('/', function () {
    return view('auth/login');
});
Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::middleware(['isAdmin'])->group(function () {    
    Route::resource('users', UserController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('projects', ProjectController::class);
});