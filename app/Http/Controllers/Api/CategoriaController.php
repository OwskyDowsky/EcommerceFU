<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categorias::all();
        return response()->json($categorias);
    }

    public function show($id)
    {
        $categoria = Categorias::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoria no encontrada'], 404);
        }

        return response()->json($categoria);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|min:3|max:30|unique:categorias',
            'descripcion' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $categoria = Categorias::create($request->all());

        return response()->json($categoria, 201);
    }

    public function update(Request $request, $id)
    {
        $categoria = Categorias::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoria no encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|min:3|max:30|unique:categorias,nombre,' . $id,
            'descripcion' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $categoria->update($request->all());

        return response()->json($categoria);
    }

    public function destroy($id)
    {
        $categoria = Categorias::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoria no encontrada'], 404);
        }

        $categoria->delete();

        return response()->json(['message' => 'Categoria eliminada correctamente']);
    }
}
