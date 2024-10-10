<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function createToken(Request $request)
    {
        // Obtener el usuario autenticado
        $user = $request->user();

        // Crear un token de acceso
        $token = $user->createToken('API Token')->plainTextToken;

        // Retornar el token en la respuesta
        return response()->json(['token' => $token]);
    }
}
