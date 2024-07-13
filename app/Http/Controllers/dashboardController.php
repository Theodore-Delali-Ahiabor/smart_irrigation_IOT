<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public static function index(Request $request){
        return view("dashboard");
    }
}
