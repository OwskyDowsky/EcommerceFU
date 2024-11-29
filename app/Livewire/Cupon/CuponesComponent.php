<?php

namespace App\Livewire\Cupon;

use App\Models\Categorias;
use App\Models\Cupones;
use App\Models\Productos;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Lista de cupones')]
class CuponesComponent extends Component
{
    use WithPagination;
    public $search = '';
    public $totalRegistros = 0;
    public $cant = 5;
    //propiedad modelo
    public $Id;
    public $nombre;
    public $descuento;
    public $fecha_vencimiento;
    public $categorias_id = [];
    public $productos_id = [];

    public function render()
    {
        // Obtén los cupones filtrados por nombre (búsqueda)
        $cupones = Cupones::where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate($this->cant);

        // Deserializa los campos JSON de categorias_id y productos_id y asigna las relaciones
        foreach ($cupones as $cupon) {
            // Convertimos los IDs de las categorías y productos del campo JSON a arrays y los usamos para obtener las relaciones
            $cupon->categorias = Categorias::whereIn('id', json_decode($cupon->categorias_id))->get();
            $cupon->productos = Productos::whereIn('id', json_decode($cupon->productos_id))->get();
        }

        $this->totalRegistros = Cupones::count();
        return view('livewire.cupon.cupones-component', [
            'cupones' => $cupones
        ]);
    }
    #[Computed()]
    public function categorias()
    {
        return Categorias::all();
    }
    #[Computed()]
    public function productos()
    {
        return Productos::all();
    }
    public function create()
    {
        $this->Id = 0;

        //$this->clean();
        $this->resetErrorBag();
        $this->dispatch('open-modal', 'modalCupon');
    }
    public function store()
    {
        $rules = [
            'nombre' => 'required|min:3|max:80|unique:cupones',
            'descuento' => 'required|numeric|min:1|max:100',
            'fecha_vencimiento' => 'required|date',
        ];
        $messages = [
            'nombre.required' => 'El nombre es requerido',
            'nombre.min' => 'El nombre debe tener minimo 3 caracteres',
            'nombre.max' => 'El nombre solo puede tener 80 caracteres',
            'nombre.unique' => 'El nombre del cupon ya existe',
            'descuento.required' => 'El descuento es requerido',
            'descuento.numeric' => 'El descuento debe ser numerico',
            'descuento.min' => 'El descuento debe ser minimo 1 caracteres',
            'descuento.max' => 'El descuento debe ser máximo 100 caracteres',
            'fecha_vencimiento.required' => 'La fecha de vencimiento es requerida',
            'fecha_vencimiento.date' => 'La fecha de vencimiento debe ser de tipo fecha',
        ];
        $this->validate($rules, $messages);

        // Crear cupón manualmente
        $cupon = new Cupones();
        $cupon->nombre = $this->nombre;
        $cupon->descuento = $this->descuento;
        $cupon->fecha_vencimiento = $this->fecha_vencimiento;
        $cupon->categorias_id = json_encode($this->categorias_id);  // Convierte el arreglo en JSON
        $cupon->productos_id = json_encode($this->productos_id);
        $cupon->save();

        // Mensaje y limpieza
        $this->dispatch('close-modal', 'modalCupon');
        $this->dispatch('msg', 'Cupón creado con éxito');
        $this->clean();
    }
    // metodo limpieza
    public function clean()
    {
        $this->reset([
            'nombre',
            'Id',
            'descuento',
            'fecha_vencimiento',
            'categorias_id',
            'productos_id'
        ]);
        $this->resetErrorBag();
    }
    public function toggleEstado($CuponId)
    {
        $cupon = Cupones::find($CuponId);
        if ($cupon) {
            $cupon->estado = $cupon->estado === 'activo' ? 'inactivo' : 'activo';
            $cupon->save();
        }
    }
}
