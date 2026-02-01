<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = Auth::user()->createToken('API Token')->plainTextToken;

        $cookie = cookie('AUTH-TOKEN', $token, 60 * 24, null, null, true, true, false, 'Lax');

        return response()->withCookie($cookie);
    }

    public function register(Request $request) 
    {
        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        User::create($fields);

        return response()->json(['message' => 'User successfully created!']);
    }

    public function show(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully!']);
    }
}
