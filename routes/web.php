<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\loginController;

Route::get('/', function () {
    return view('dashboard');
});

/* Login */
Route::get('/login', [loginController::class, 'index']);

/* Dashboard */
Route::get('/dashboard', [dashboardController::class, 'index']);

/* Users  */
Route::get('/users', [usersController::class, 'index']);

/*  */
