<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            $user = User::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(['message' => '❌ Credenciales inválidas'], 400);
            }
            $token = Str::random(60);
            $user->update(['remember_token' => $token]);
            return response()->json([
                'message' => '✅ Login exitoso',
                'token' => $token,
                'user' => $user
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
    public function logout(Request $request)
    {
        // try{
        //     $request->validate([
        //         'remember_token' => 'required',
        //     ]);
        //     $user = User::where('remember_token', $request->remember_token)->first();
        //     if (!$user) {
        //         return response()->json(['message' => '❌ Token no encontrado'], 401);
        //     }
        //     $user->update(['remember_token' => null]);
        //     return response()->json(['message' => "Token eliminado correctamente"]);
        // } catch (\Exception $e) {
        //     return response()->json(['errors' => $e->getMessage()], 400);
        // }
        $token = str_replace('Bearer ', '', $request->header('Authorization'));
        $user = User::where('remember_token', $token)->first();
        if ($user) {
            $user->update(['remember_token' => null]);
            return response()->json(['message' => "Token eliminado correctamente"], 200);
        }

        return response()->json(['message' => '❌ Token no encontrado'], 401);
    }
}
