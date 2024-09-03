<?php

namespace App\Livewire\Sede;

use App\Models\Sedes;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Storage;

#[Title('Sedes')]
class SedeComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search='';
    public $totalRegistros=0;
    public $cant=5;
    //propiedad del modelo
    public $Id;
    public $nombre;
    public $ubicacion;

    public function render()
    {
        $this->totalRegistros = Sedes::count();
        $sedes = Sedes::where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate($this->cant);
        return view('livewire.sede.sede-component', [
            'sedes' => $sedes
        ]);
    }
    public function create(){
        $this->Id=0;

        $this->clean();
        $this->resetErrorBag();
        $this->dispatch('open-modal','modalSede');
        
    }
    public function store()
    {
        $rules = [
            'nombre' => 'required|min:3|max:80|unique:sedes',
            'ubicacion' => 'max:250',
        ];
        $messages = [
            'nombre.required' => 'El nombre es requerido',
            'nombre.min' => 'El nombre debe tener minimo 3 caracteres',
            'nombre.max' => 'El nombre solo puede tener 80 caracteres',
            'nombre.unique' => 'El nombre de la categoria ya existe'
        ];
        $this->validate($rules, $messages);
        $sede = new Sedes();

        $sede->nombre = $this->nombre;
        $sede->ubicacion = $this->ubicacion;
        $sede->save();

        /*if ($this->image) {
            $customName = 'tours/' . uniqid() . '.' . $this->image->extension();
            $this->image->storeAs('public', $customName);
            $tours->image()->create(['url' => $customName]);
        }*/

        $this->dispatch('close-modal', 'modalSede');
        $this->dispatch('msg', 'Sede creado con exito');
        $this->clean();
    }
    public function edit(Sedes $sede)
    {
        //agrege el reset
        $this->clean();
        $this->Id = $sede->id;
        $this->nombre = $sede->nombre;
        $this->ubicacion = $sede->ubicacion;
        //$this->imageModel = $tour->imagen;

        $this->dispatch('open-modal', 'modalSede');
    }
    public function update(Sedes $sede)
    {
        $rules = [
            'nombre' => 'required|min:3|max:80|unique:sedes,id,' . $this->Id,
            'ubicacion' => 'max:250',
            'tipo' => 'required',
            'image' => 'image|max:3024|nullable',
        ];
        $this->validate($rules);

        $sede->nombre = $this->nombre;
        $sede->ubicacion = $this->ubicacion;
        //$tour->imageModel = $this->imagen;

        $sede->update();
        /*if ($this->image) {
            if ($producto->image != null) {
                Storage::delete('public/' . $tour->image->url);
                $tour->image()->delete();
            }
            $customName = 'tours/' . uniqid() . '.' . $this->image->extension();
            $this->image->storeAs('public', $customName);
            $tour->image()->create(['url' => $customName]);
        }*/

        $this->dispatch('close-modal', 'modalSede');
        $this->dispatch('msg', 'Sede editada correctamente');

        $this->clean();
    }
    #[On('destroySede')]
    public function destroy($id)
    {
        $sede = Sedes::findOrfail($id);
        $sede->delete();

        $this->dispatch('msg', 'Sede eliminada correctamente');
    }
    // metodo limpieza
    public function clean()
    {
        $this->reset([
            'nombre', 'Id', 'ubicacion',
        ]);
        $this->resetErrorBag();
    }
}
