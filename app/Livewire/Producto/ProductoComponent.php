<?php

namespace App\Livewire\Producto;

use Livewire\Component;
use App\Models\Productos;
use App\Models\Categorias;
use App\Models\Proyectos;
use App\Models\Sedes;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Storage;

#[Title('Productos')]
class ProductoComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search='';
    public $totalRegistros=0;
    public $cant=5;
    //propiedad del modelo
    public $Id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $stock;
    public $estado = "activo";
    public $categoria_id;
    public $proyecto_id;
    public $sede_id;
    //imagen
    public $image;
    public $imageModel;

    public function render()
    {
        // Filtrar proyectos activos
        $proyectosActivos = Proyectos::where('estado', 'activo')->get();

        $this->totalRegistros = Productos::count();
        $productos = Productos::where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate($this->cant);
        return view('livewire.producto.producto-component', [
            'productos' => $productos,
            'proyectos' => $proyectosActivos     
        ]);
    }
    #[Computed()]
    public function categorias()
    {
        return Categorias::all();
    }
    #[Computed()]
    public function proyectos()
    {
        return Proyectos::all();
    }
    #[Computed()]
    public function sedes()
    {
        return Sedes::all();
    }
    public function create(){
        $this->Id=0;

        $this->clean();
        $this->resetErrorBag();
        $this->dispatch('open-modal','modalProducto');
        
    }
    //agregar un producto
    public function store()
    {
        $rules = [
            'nombre' => 'required|min:3|max:80|unique:productos',
            'descripcion' => 'max:250',
            'precio' => 'required|numeric',
            'image' => 'image|max:3024|nullable',
        ];
        $messages = [
            'nombre.required' => 'El nombre es requerido',
            'nombre.min' => 'El nombre debe tener minimo 3 caracteres',
            'nombre.max' => 'El nombre solo puede tener 80 caracteres',
            'nombre.unique' => 'El nombre de la categoria ya existe'
        ];
        $this->validate($rules, $messages);
        $producto = new Productos();

        $producto->nombre = $this->nombre;
        $producto->descripcion = $this->descripcion;
        $producto->precio = $this->precio;
        $producto->stock = $this->stock;
        $producto->categoria_id = $this->categoria_id;
        $producto->proyecto_id = $this->proyecto_id;
        $producto->sede_id = $this->sede_id;
        $producto->estado = $this->estado;
        $producto->save();

        if ($this->image) {
            $customName = 'productos/' . uniqid() . '.' . $this->image->extension();
            $this->image->storeAs('public', $customName);
            $producto->image()->create(['url' => $customName]);
        }

        $this->dispatch('close-modal', 'modalProducto');
        $this->dispatch('msg', 'Producto creado con exito');
        $this->clean();
    }
    public function edit(Productos $producto)
    {
        //agrege el reset
        $this->clean();
        $this->Id = $producto->id;
        $this->nombre = $producto->nombre;
        $this->descripcion = $producto->descripcion;
        $this->precio = $producto->precio;
        $this->stock = $producto->stock;
        $this->categoria_id = $producto->categoria_id;
        $this->proyecto_id = $producto->proyecto_id;
        $this->sede_id = $producto->sede_id;
        $this->imageModel = $producto->image ? $producto->image->url : null;


        $this->dispatch('open-modal', 'modalProducto');
    }
    public function update(Productos $producto)
    {
        $rules = [
            'nombre' => 'required|min:3|max:80|unique:productos,id,' . $this->Id,
            'descripcion' => 'max:250',
            'precio' => 'required|numeric',
            'image' => 'image|max:3024|nullable',
        ];
        $this->validate($rules);

        $producto->nombre = $this->nombre;
        $producto->descripcion = $this->descripcion;
        $producto->precio = $this->precio;
        $producto->stock = $this->stock;
        $producto->categoria_id = $this->categoria_id;
        $producto->proyecto_id = $this->proyecto_id;
        $producto->sede_id = $this->sede_id;
        //$producto->imageModel = $this->imagen;

        $producto->update();
        if ($this->image) {
            if ($producto->image != null) {
                Storage::delete('public/' . $producto->image->url);
                $producto->image()->delete();
            }
            $customName = 'productos/' . uniqid() . '.' . $this->image->extension();
            $this->image->storeAs('public', $customName);
            $producto->image()->create(['url' => $customName]);
        }

        $this->dispatch('close-modal', 'modalProducto');
        $this->dispatch('msg', 'Producto editada correctamente');

        $this->clean();
    }
    #[On('destroyProducto')]
    public function destroy($id)
    {
        $producto = Productos::findOrfail($id);
        if ($producto->image != null) {
            Storage::delete('public/' . $producto->image->url);
            $producto->image()->delete();
        }
        $producto->delete();

        $this->dispatch('msg', 'Producto Eliminada correctamente');
    }
    // metodo limpieza
    public function clean()
    {
        $this->reset([
            'nombre', 'Id', 'descripcion', 'precio', 'stock',
            'categoria_id', 'proyecto_id', 'sede_id', 'image', 'imageModel'
        ]);
        $this->resetErrorBag();
    }

    public function toggleEstado($ProductoId)
    {
        $producto = Productos::find($ProductoId);
        if ($producto) {
            $producto->estado = $producto->estado === 'activo' ? 'inactivo' : 'activo';
            $producto->save();
        }
    }
}
