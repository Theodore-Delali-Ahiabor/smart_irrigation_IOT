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
        try {
            // check if user already exist
            $user = User::where('email', (isset($request->email) && !empty($request->email) ? $request->email : false));

            if($user){
                // Validate the request data
                $validated = $request->validate([
                    'first_name' => 'required',
                    'other_name' => '',
                    'last_name' => 'required',
                    'email' => 'required|email',
                ]);

                // Confirm password
                $type = "warning";
                // Edit existing user
                if (User::save($validated)) {
                    $type = "success";
                    $message = "User updated successfully";
                }else{
                    $message = "Invalid user credentials";
                }
            }else{
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
                    // Add new user
                    if (User::create($validated)) {
                        $type = "success";
                        $message = "User created successfully";
                    }else{
                        $message = "Invalid user credentials";
                    }
                }else{
                    $message = "Password mismatch, check password and try again";
                }
            }
        } catch (\Throwable $th) {
            $message = "Add new user error: ".$th->getMessage();
        }
        // Return an Inertia response
        return Inertia::render('Users', [
            'type' => isset($type) ? $type : '',
            'message' => isset($message) ? $message : '',
            'data' => isset($validated) ? $validated : '',
        ]);
    }

    public static function toggleStatus(Request $request){

        $user = User::find($request->id);

        if ($user) {
            $user->active = ($request->status == 1) ? 0 : 1;
            $user->save();
            $type = "success";
            $message = "User ".(($request->status == 1) ? 'deactivated' : 'activated')." successfully";
        }

        return Inertia::render('Users', [
            'type' => isset($type) ? $type : '',
            'message' => isset($message) ? $message : '',
        ]);
    }
}
