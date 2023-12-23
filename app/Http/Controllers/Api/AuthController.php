<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //$token = $user->createToken('auth_token')->accessToken;

        return response()->json([
            'status' => true,
            'message' => 'Register success',
            'data' => $user
            //'access_token' => $token
        ], 200);
    }

    public function login(Request $request)
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'status'  => false,
                'message' => 'Email atau password salah.'
            ], 400);
        }

        $token = Auth::user()->createToken('auth_token')->accessToken;

        return response()->json([
            'status'  => true,
            'message' => 'Login success',
            'user'    => Auth::user(),
            'access_token' => $token
        ], 200);
    }

    public function profile()
    {
        return response()->json([
               'status' => true,
               'message' => 'Berhasil cek profile',
               'user'  => Auth::user()
        ], 200);
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();

        return response()->json([
            'status' => true,
            'message' => 'logout success'
        ], 200);
    }
}
