<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function login(Request $request)
    {
        $request->only(['email', 'password']);

        if (!auth()->attempt($request->only(['email', 'password'])) || auth()->user()->role !== 'admin') {
            return response()->json( ['Credentials do not match']);
        }

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('API Token')->plainTextToken
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'You have succesfully been logged out and your token has been removed'
        ]);
    }
}
