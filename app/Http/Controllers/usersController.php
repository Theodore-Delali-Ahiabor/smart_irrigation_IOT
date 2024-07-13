<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usersController extends Controller
{
    public static function index(Request $request){
        return view('users');
    }
}
