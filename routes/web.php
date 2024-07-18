<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\statisticsController;
use App\Http\Controllers\settingsController;

/* Redirect landing page to login */
Route::redirect('/', '/login', 301);

/* Login */
Route::get('/login', [loginController::class, 'index'])->name('login');

Route::middleware('auth')->group(function(){
    /* Dashboard */
    Route::get('/dashboard', function(){
        return Inertia::render('Dashboard', ['page' => "Dashboard"]);
    });

    /* Users  */
    Route::get('/users', function(){
        return Inertia::render('Users', ['page' => "Dashboard"]);
    });

    /* Statistics */
    Route::get('/statistics', function(){
        return Inertia::render('Dashboard', ['page' => "Dashboard"]);
    });

    /* Settings */
    Route::get('/settings', function(){
        return Inertia::render('Settings', ['page' => "Dashboard"]);
    });
});

