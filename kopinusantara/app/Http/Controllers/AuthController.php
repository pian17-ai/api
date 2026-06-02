<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        $validated = $request->validate([
            'full_name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ]);

        $user = User::create([
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Register successfully',
            'data' => $user,
            'token' => $token
        ], 201);
    }
    
    public function login(Request $request) {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Wrong email or password'
            ], 401);
        }

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
                'status' => 'success',
                'message' => 'Login successfully',
                'data' => $user,
                'token' => $token
            ]);
    }

    public function logout(Request $request) {
        $user = $request->user();

        $user->tokens()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Logout successfully'
        ]);
    }
}
