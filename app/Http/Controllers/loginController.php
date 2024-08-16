<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class loginController extends Controller
{
    public static function login(Request $request){

        // Validate the request data
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Authenticating user
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            $type = "success";
            $message = "Welcome __, you looged in successfully";
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
