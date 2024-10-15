<?php

namespace App\Livewire\Cliente;

use App\Models\Clientes;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Usuarios clientes')]
class ClienteComponent extends Component
{
    use WithPagination;
    public $search='';
    public $totalRegistros=0;
    public $cant=5;
    //propiedad modelo
    public $Id;
    public $nombre;
    public $apellido;
    public $cod_estudiante;
    public $ci;
    public $estado = "activo";

    public function render()
    {
        $clientes = Clientes::where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate($this->cant);
        $this->totalRegistros = Clientes::count();
        return view('livewire.cliente.cliente-component',[
            'clientes' => $clientes
        ]);
    }

    public function create()
    {
        $this->Id = 0;

        $this->clean();
        $this->dispatch('open-modal', 'modalClientes');
    }

    public function store()
    {
        $rules = [
            'nombre' => 'required|min:3|max:80',
            'cod_estudiante' => 'required|max:250|unique:clientes',
            'ci' => 'required|min:7|max:8|unique:clientes',
        ];
        $messages = [
            'nombre.required' => 'El nombre es requerido',
            'nombre.min' => 'El nombre debe tener minimo 3 caracteres',
            'nombre.max' => 'El nombre solo puede tener 80 caracteres',
        ];
        $this->validate($rules, $messages);
        $cliente = new Clientes();

        $cliente->nombre = $this->nombre;
        $cliente->apellido = $this->apellido;
        $cliente->ci = $this->ci;
        $cliente->cod_estudiante = $this->cod_estudiante;
        $cliente->estado = $this->estado;
        $cliente->save();

        $this->dispatch('close-modal', 'modalClientes');
        $this->dispatch('msg', 'Clientes creado con exito');
        $this->clean();
    }
    public function edit(Clientes $cliente)
    {
        $this->clean();
        $this->Id = $cliente->id;
        $this->nombre = $cliente->nombre;
        $this->apellido = $cliente->apellido;
        $this->ci = $cliente->ci;
        $this->cod_estudiante = $cliente->cod_estudiante;
        $this->estado = $cliente->estado;

        $this->dispatch('open-modal', 'modalClientes');
    }
    public function update(Clientes $cliente)
    {
        $rules = [
            'nombre' => 'required|min:3|max:80',
            'email' => 'required|email|max:250|unique:clientes,id,'.$this->Id,
            'ci' => 'required|min:7|max:8|unique:clientes,id,'.$this->Id,
        ];
        $this->validate($rules);

        $cliente->nombre = $this->nombre;
        $cliente->id = $this->Id;
        $cliente->apellido = $this->apellido;
        $cliente->ci = $this->ci;
        $cliente->cod_estudiante = $this->cod_estudiante;
        $cliente->estado = $this->estado;

        $this->dispatch('close-modal', 'modalClientes');
        $this->dispatch('msg', 'Cliente editado correctamente');

        $this->clean();
    }
    #[On('destroyCliente')]
    public function destroy($id)
    {
        $cliente = Clientes::findOrfail($id);
        $cliente->delete();

        $this->dispatch('msg', 'Cliente Eliminado correctamente');
    }
    // metodo limpieza
    public function clean()
    {
        $this->reset([
            'nombre','apellido', 'Id', 'ci', 'cod_estudiante','estado',
        ]);
        $this->resetErrorBag();
    }
    public function toggleEstado($clienteId)
    {
        $cliente = Clientes::find($clienteId);
        if ($cliente) {
            $cliente->estado = $cliente->estado === 'activo' ? 'inactivo' : 'activo';
            $cliente->save();
        }
    }

}
