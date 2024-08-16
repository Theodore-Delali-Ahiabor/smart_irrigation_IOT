<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class settingsController extends Controller
{
    public static function index(Request $request){
        return Inertia::render('Settings', [
            'page' => "Settings",
        ]);
    }
}
