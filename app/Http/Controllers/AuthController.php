<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \stdClass;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|min:3|max:80',
            'email' => 'required|email|max:250|unique:users',
            'ci' => 'required|min:7|max:8|unique:users',
            'password' => 'required|min:8',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'apellido_paterno' => $request->apellido_paterno,
            'ci' => $request->ci,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['data' => $user, 'access_token' => $token, 'token_type' => 'Bearer',]);
    }

    /*public function login(Request $request){
        if(!Auth::attempt($request->only('email', 'password'))){
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;


        return response()
            ->json([
                'message' => 'Bienvenido ' .$user->name,
                'accessToken' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
            ]);
    }*/

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        $user = Auth::user();

        // Crear token con expiración de 1 minuto para testeo
        $token = $user->createToken('auth_token', ['*'], now()->addMinutes(10))->plainTextToken;

        return response()
            ->json([
                'message' => 'Bienvenido ' .$user->name,
                'accessToken' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
            ]);
    }
    

    public function logout(){
        
        auth()->user()->tokens()->delete();

        return[
            'message' => 'Cerraste sesión correctamente y tu token ha sido eliminado'
        ];
    }
}
