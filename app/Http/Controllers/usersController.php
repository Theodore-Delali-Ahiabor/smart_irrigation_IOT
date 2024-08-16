<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
class usersController extends Controller
{
    public static function index(Request $request){
        return Inertia::render('Users', [
            'page' => "Users",
            'users' => User::all(),
        ]);
    }
    public static function manage(Request $request){

        // Validate the request data
        $validated = $request->validate([
            'first_name' => 'required',
            'other_name' => '',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Confirm password
        $type = "warning";
        if($request->password == $request->confirmPassword){
            try {
                // Add new user
                if (User::create($validated)) {
                    $type = "success";
                    $message = "User created successfully";
                }else{
                    $message = "Invalid user credentials";
                }
            } catch (\Throwable $th) {
                $message = "Add new user error: ".$th->getMessage();
            }
        }else{
            $message = "Password mismatch, check password and try again";
        }

        // Return an Inertia response
        return Inertia::render('/users', [
            'type' => isset($type) ? $type : '',
            'message' => isset($message) ? $message : '',
            'data' => $validated,
        ]);
    }
}
