<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'), $request['remember_me'])) {
            return response()->json(['respuesta' => 'Error, usuario y/o contraseña incorrectos'], 200);
        }else{
            $usuario = User::where('email', $request['email'])->firstOrFail();
            $token = $usuario->createToken('auth_token')->plainTextToken;
            return response()->json([
                        'respuesta' => 1,
                        'access_token' => $token,
                        'token_type' => 'Bearer',
            ]);
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        return response()->json(['respuesta' => $user->tokens()->delete()], 200);
    }

    public function verifySession(Request $request)
    {
        return response()->json(['respuesta' => Auth::check()], 200);
    }
}
