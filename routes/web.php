<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\settingsController;

/* Redirect landing page to login */
Route::get('/', [loginController::class, 'index']);

/* Login */
Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/login', [loginController::class, 'login']);
Route::get('/logout', [loginController::class, 'index'])->name('logout');

Route::middleware('auth')->group(function(){
    /* Dashboard */
    Route::get('/dashboard', [dashboardController::class, 'index']);


    /* Users */
    Route::get('/users', [usersController::class, 'index']);
    Route::post('/user-manage', [usersController::class, 'manage']);


    /* Settings */
    Route::get('/settings', [settingsController::class, 'index']);

});

