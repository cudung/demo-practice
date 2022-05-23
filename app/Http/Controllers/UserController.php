<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function register(UserRequest $request) {
        $user  = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        return response()->json([
            'message' => 'Register Complete',
            'data' => $user,
        ],201);
    }

    public function login(UserLoginRequest $request) {
        
        if(Auth::attempt($request->all())) {
            $user = Auth::user();
            $user->token = $user->createToken('adminToken')->accessToken;
            $response = [
                'message' => 'Login complete',
                'data' => $user,
                'code' => 200
            ];
            
        } else {
            $response = [
                'message' => 'Email or Pasword was wrong',
                'data' => '',
                'code' => 401
            ];
        }
        return response()->json($response, $response['code']);

    }
}
