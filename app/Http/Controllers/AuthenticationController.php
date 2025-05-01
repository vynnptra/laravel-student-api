<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'User created successfully',
            'data' => $user
        ], 200);
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status' => 401,
                'message' => 'Invalid credentials'
            ], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'status' => 200,
            'message' => 'User logged in successfully',
            'data' => $user,
            'token' => $token
        ], 200);
    }

    public function forgotPassword(Request $request){
        $request->validate([
            'email' => 'email|required|exists:users,email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );
        
        if ($status) {
            return response()->json([
                'status' => 200,
                'message' => 'email has been send',
                'data' => $status
            ], 200);
        }

        return response()->json([
            'status' => 401,
            'message' => 'cant sent email, please input correct email'
        ], 401);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );
    
        return $status === Password::PASSWORD_RESET
            ? response()->json([
                'status' => 200,
                'message' => 'Password has been reset.',
                'data' => [
                    'email' => $request->email
                ]
            ], 200)
            : throw ValidationException::withMessages([
                'email' => [__($status)],
            ]);
    }
    

    public function logout(Request $request)
    {
        if ($request->user()?->currentAccessToken()) {
            $request->user()->currentAccessToken()->delete();
        }
    
        return response()->json([
            'status' => 200,
            'message' => "You have been logged out"
        ], 200);
    }
    
    
}
