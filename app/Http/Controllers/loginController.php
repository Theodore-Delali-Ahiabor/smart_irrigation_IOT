<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class loginController extends Controller
{
    public static function login(Request $request){
        $type = "success";
        $message = "Welcome __, you looged in successfully";

        // Validate the request data
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Process the data (e.g., save to the database)

        // Return an Inertia response
        return Inertia::render('Login', [
            'type' => $type,
            'message' => $message,
            'data' => $validated,
        ]);
    }
}
