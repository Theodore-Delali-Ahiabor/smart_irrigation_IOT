<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class loginController extends Controller
{
    public static function index(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return Inertia::render('Login');
    }

    public static function login(Request $request){

        // Validate the request data
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Authenticating user
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            $name = Auth::user()->first_name;

            $type = "success";
            $message = "Welcome $name, you looged in successfully";
        }else{
            $type = "warning";
            $message = "Invalid login credentials";
        }

        // Return an Inertia response
        return Inertia::render('Login', [
            'type' => isset($type) ? $type : '',
            'message' => isset($message) ? $message : '',
            'data' => $validated,
        ]);
    }
}
