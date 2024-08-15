<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\statisticsController;
use App\Http\Controllers\settingsController;

/* Redirect landing page to login */
// Route::redirect('/', '/login', 301);
Route::get('/', function(){
    return Inertia::render('Login', ['page' => 'Login']);
});

/* Login */
Route::get('/login', function(){
    return Inertia::render('Login', ['page' => 'Login']);
})->name('login');

Route::post('/login', [loginController::class, 'login'])->name('login.submit');

Route::middleware('auth')->group(function(){
    /* Dashboard */
    Route::get('/dashboard', function(){
        return Inertia::render('Dashboard', ['page' => "Dashboard"]);
    });

    /* Users */
    Route::get('/users', function(){
        return Inertia::render('Users', ['page' => "Dashboard"]);
    });

    /* Statistics */
    Route::get('/statistics', function(){
        return Inertia::render('Statistics', ['page' => "Statistics"]);
    });

    /* Settings */
    Route::get('/settings', function(){
        return Inertia::render('Settings', ['page' => "Dashboard"]);
    });
});

