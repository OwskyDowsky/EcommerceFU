<?php

namespace App\Livewire\Venta;

use App\Models\Clientes;
use Livewire\Attributes\On;
use Livewire\Component;

class Client extends Component
{
    public $Id = 0;
    public $client=1;
    public $nameClient;
    //
    public $nombre; // Asegúrate de declarar la propiedad
    public $apellido; // Declarar también
    public $cod_estudiante; // Declarar también
    public $ci;

    public function render()
    {
        return view('livewire.venta.client', [
            "clientes" => Clientes::all()
        ]);
    }

    #[On('clientes_id')]
    public function client_id($id=1){
        $this->client = $id;
        $this->nameClient($id);
    }

    /*public function mount(){
        $this->nameClient();
    }*/
    public function mount() {
        // Asegúrate de que 'client' esté inicializado correctamente
        if ($this->client) {
            $this->nameClient($this->client);
        } else {
            $this->nameClient = 'Cliente no seleccionado'; // o cualquier valor por defecto
        }
    } 

    public function nameClient($id=1){
        $findClient = Clientes::find($id);
        $this->nameClient = $findClient->name;
    }

    //crear la cliente
    public function store()
    {

        $rules = [
            'nombre' => 'required|min:3|max:100',
        ];
        $messages = [
            'nombre.required' => 'El nombre es requerido',
            'nombre.max' => 'El nombre solo puede tener 100 caracteres',
            'nombre.min' => 'El nombre debe tener minimo 3 caracteres',
        ];
        $this->validate($rules, $messages);

        $cliente = new Clientes();
        $cliente->nombre = $this->nombre;
        $cliente->apellido = $this->apellido;
        $cliente->cod_estudiante = $this->cod_estudiante;
        $cliente->ci = $this->ci;

        $cliente->save();

        $this->dispatch('close-modal', 'modalClientes');
        $this->dispatch('msg', 'Cliente creado correctamente');

        $this->dispatch('client_id',$cliente->id);

        $this->clean();
    }

    public function openModal()
    {
        $this->dispatch('open-modal', 'modalClientes');
    }

    public function clean(){
        $this->reset(['nombre','apellido','cod_estudiante','ci']);
        $this->resetErrorBag();
    }
}
