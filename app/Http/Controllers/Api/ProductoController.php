<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productos;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;


class ProductoController extends Controller
{
    // Listar productos
    public function index(Request $request)
    {
        $search = $request->input('search', '');
    
        // Consultar productos con las relaciones de categoría y proyecto
        $productos = Productos::with(['categoria', 'proyecto'])
            ->where('nombre', 'like', '%' . $search . '%')
            ->orderBy('id', 'desc')
            ->get();
    
        // Formatear la respuesta para mostrar el nombre de la categoría y del proyecto
        $productosFormatted = $productos->map(function ($producto) {
            return [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'descripcion' => $producto->descripcion,
                'precio' => $producto->precio,
                'stock' => $producto->stock,
                'estado' => $producto->estado,
                'categoria' => $producto->categoria ? $producto->categoria->nombre : null,
                'proyecto' => $producto->proyecto ? $producto->proyecto->nombre : null,
                'sede' => $producto->sede ? $producto->sede->nombre : null,
                'image' => $producto->image ? $producto->image->url : null,
            ];
        });
    
        return response()->json($productosFormatted);
    }
    

    // Mostrar un producto específico
    public function show($id)
    {
        $producto = Productos::findOrFail($id);
        return response()->json($producto);
    }

    // Crear un producto
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|min:3|max:80|unique:productos',
            'descripcion' => 'max:250',
            'precio' => 'required|numeric',
            'stock' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
            'proyecto_id' => 'nullable|exists:proyectos,id',
            'sede_id' => 'nullable|exists:sedes,id',
            'estado' => 'required|in:activo,inactivo',
            'image' => 'nullable|image|max:3024',
        ]);

        $producto = Productos::create($validatedData);

        if ($request->hasFile('image')) {
            $imageName = 'productos/' . uniqid() . '.' . $request->file('image')->extension();
            $request->file('image')->storeAs('public', $imageName);
            $producto->image()->create(['url' => $imageName]);
        }

        return response()->json(['message' => 'Producto creado con éxito', 'producto' => $producto], 201);
    }

    // Actualizar un producto
    public function update(Request $request, $id)
    {
        $producto = Productos::findOrFail($id);

        $validatedData = $request->validate([
            'nombre' => 'required|min:3|max:80|unique:productos,nombre,' . $id,
            'descripcion' => 'max:250',
            'precio' => 'required|numeric',
            'stock' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
            'proyecto_id' => 'nullable|exists:proyectos,id',
            'sede_id' => 'nullable|exists:sedes,id',
            'estado' => 'required|in:activo,inactivo',
            'image' => 'nullable|image|max:3024',
        ]);

        $producto->update($validatedData);

        if ($request->hasFile('image')) {
            if ($producto->image) {
                Storage::delete('public/' . $producto->image->url);
                $producto->image()->delete();
            }
            $imageName = 'productos/' . uniqid() . '.' . $request->file('image')->extension();
            $request->file('image')->storeAs('public', $imageName);
            $producto->image()->create(['url' => $imageName]);
        }

        return response()->json(['message' => 'Producto actualizado con éxito', 'producto' => $producto]);
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $producto = Productos::findOrFail($id);

        if ($producto->image) {
            Storage::delete('public/' . $producto->image->url);
            $producto->image()->delete();
        }

        $producto->delete();

        return response()->json(['message' => 'Producto eliminado con éxito']);
    }
}
