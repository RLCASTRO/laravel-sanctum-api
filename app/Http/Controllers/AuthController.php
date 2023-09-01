<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Store the request data into a variable
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        //Creates the user obj with the request data
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        //Generates the Token
        $token = $user->createToken('myapptoken')->plainTextToken;

        //Generates the Response object
        $response = [
            'user' => $user,
            'token' => $token,
        ];

        //Returns the Response object with the status code 201
        return response($response, 201);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        $user->tokens()->delete();

        return [
            'message' => 'Logout Success'
        ];
    }
}
