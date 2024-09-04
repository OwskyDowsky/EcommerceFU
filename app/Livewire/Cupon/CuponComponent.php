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

#[Title('Lista de cupones')]
class CuponComponent extends Component
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
    public $categoria_id;
    public $producto_id;

    public function render()
    {
        $this->totalRegistros = Cupones::count();
        $cupones = Cupones::where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate($this->cant);
        return view('livewire.cupon.cupon-component',[
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
        ];
        $messages = [
            'nombre.required' => 'El nombre es requerido',
            'nombre.min' => 'El nombre debe tener minimo 3 caracteres',
            'nombre.max' => 'El nombre solo puede tener 80 caracteres',
            'nombre.unique' => 'El nombre de la categoria ya existe'
        ];
        $this->validate($rules, $messages);
        $cupon = new Cupones();

        $cupon->nombre = $this->nombre;
        $cupon->descuento = $this->descuento;
        $cupon->fecha_vencimiento = $this->fecha_vencimiento;
        $cupon->categoria_id = $this->categoria_id;
        $cupon->producto_id = $this->producto_id;
        $cupon->save();

        /*if ($this->image) {
            $customName = 'tours/' . uniqid() . '.' . $this->image->extension();
            $this->image->storeAs('public', $customName);
            $tours->image()->create(['url' => $customName]);
        }*/

        $this->dispatch('close-modal', 'modalCupon');
        $this->dispatch('msg', 'Cupon creado con exito');
        $this->clean();
    }
    public function edit(Cupones $cupon)
    {
        //agrege el reset
        $this->clean();
        $this->Id = $cupon->id;
        $this->nombre = $cupon->nombre;
        $this->descuento = $cupon->descuento;
        $this->fecha_vencimiento = $cupon->fecha_vencimiento;
        $this->categoria_id = $cupon->categoria_id;
        $this->producto_id = $cupon->producto_id;
        //$this->imageModel = $tour->imagen;

        $this->dispatch('open-modal', 'modalCupon');
    }
    public function update(Cupones $cupon)
    {
        $rules = [
            'nombre' => 'required|min:3|max:80|unique:cupones,id,' . $this->Id,
        ];
        $this->validate($rules);

        $cupon->nombre = $this->nombre;
        $cupon->descuento = $this->descuento;
        $cupon->fecha_vencimiento = $this->fecha_vencimiento;
        $cupon->categoria_id = $this->categoria_id;
        $cupon->producto_id = $this->producto_id;
        //$tour->imageModel = $this->imagen;

        $cupon->update();
        /*if ($this->image) {
            if ($producto->image != null) {
                Storage::delete('public/' . $tour->image->url);
                $tour->image()->delete();
            }
            $customName = 'tours/' . uniqid() . '.' . $this->image->extension();
            $this->image->storeAs('public', $customName);
            $tour->image()->create(['url' => $customName]);
        }*/

        $this->dispatch('close-modal', 'modalCupon');
        $this->dispatch('msg', 'Cupon editada correctamente');

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
            'nombre', 'Id', 'descuento', 'fecha_vencimiento', 'categoria_id', 'producto_id'
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
