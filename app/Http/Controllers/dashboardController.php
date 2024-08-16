<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class dashboardController extends Controller
{
    public static function index(Request $request){
        return Inertia::render('Dashboard', [
            'page' => "Dashboard",
        ]);
    }
}
