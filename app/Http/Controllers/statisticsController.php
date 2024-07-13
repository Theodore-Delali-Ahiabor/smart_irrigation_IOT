<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class statisticsController extends Controller
{
    public static function index(Request $request){
        return view("statistics");
    }
}
