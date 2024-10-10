<?php

namespace App\Livewire\Cupon;

use App\Models\Cupones;
use Livewire\Component;
use App\Models\Categorias;
use App\Models\Productos;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;

#[Title('Lista de cupones por producto')]
class CuponProductoComponent extends Component
{
    use WithPagination;
    public $search='';
    public $totalRegistros=0;
    public $cant=5;
    //propiedad modelo
    public $Id;
    public $nombre;
    public $descuento;
    public $fecha_vencimiento;
    public $producto_id = [];
    public $tipo_cupon;

    public function render()
    {
        $cupones = Cupones::whereHas('productos', function($query) {
        })->where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate($this->cant);

        $this->totalRegistros = Cupones::count();
    
        return view('livewire.cupon.cupon-producto-component', [
            'cupones' => $cupones  // Aquí pasamos los cupones sin intentar almacenar la paginación como propiedad
        ]);
    }

    #[Computed()]
    public function productos()
    {
        return Productos::all();
    }
    public function create(){
        $this->Id=0;

        //$this->clean();
        $this->resetErrorBag();
        $this->dispatch('open-modal','modalCupon');
        
    }
    public function store()
    {
        $rules = [
            'nombre' => 'required|min:3|max:80|unique:cupones',
            'descuento' => 'required|numeric|min:1|max:100',
            'fecha_vencimiento' => 'required|date',
            'producto_id' => 'array',
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
        $this->validate($rules);
    
        // Crear cupón manualmente
        $cupon = new Cupones();
        $cupon->nombre = $this->nombre;
        $cupon->descuento = $this->descuento;
        $cupon->fecha_vencimiento = $this->fecha_vencimiento;
        $cupon->save();
    
        // Sincronizar categorías y productos
        $cupon->productos()->sync($this->producto_id);
    
        // Mensaje y limpieza
        $this->dispatch('close-modal', 'modalCupon');
        $this->dispatch('msg', 'Cupón creado con éxito');
        $this->clean();
    }

    public function edit(Cupones $cupon)
    {
        //agrege el reset
        $this->clean();
    
        // Asignar datos del cupón
        $this->Id = $cupon->id;
        $this->nombre = $cupon->nombre;
        $this->descuento = $cupon->descuento;
        $this->fecha_vencimiento = $cupon->fecha_vencimiento;
        $this->categoria_id = $cupon->categorias->pluck('id')->toArray();
        $this->producto_id = $cupon->productos->pluck('id')->toArray();

        // Abrir modal para editar
        $this->dispatch('open-modal', 'modalCupon');
    }
    public function update(Cupones $cupon)
    {
        $rules = [
            'nombre' => 'required|min:3|max:80|unique:cupones,nombre,' . $this->Id,
            'descuento' => 'required|numeric|min:1|max:100',
            'fecha_vencimiento' => 'required|date',
            'producto_id' => 'array',
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
        $this->validate($rules);

        // Actualizar cupón
        $cupon->update([
            'nombre' => $this->nombre,
            'descuento' => $this->descuento,
            'fecha_vencimiento' => $this->fecha_vencimiento,
            'producto_id' => $this->producto_id, 
        ]);

        // Actualizar las categorías en la tabla intermedia
        $cupon->productos()->sync($this->producto_id);

        // Mensaje y limpieza
        $this->dispatch('close-modal', 'modalCupon');
        $this->dispatch('msg', 'Cupón actualizado correctamente');
        $this->clean();
    }

    #[On('destroyCupon')]
    public function destroy($id)
    {
        $cupon = Cupones::findOrfail($id);
        $cupon->delete();

        $this->dispatch('msg', 'Cupon eliminada correctamente');
    }
    // metodo limpieza
    public function clean()
    {
        $this->reset([
            'nombre', 'Id', 'descuento', 'fecha_vencimiento', 'producto_id'
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
