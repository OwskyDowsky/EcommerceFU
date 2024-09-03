<?php

namespace App\Livewire\Proyecto;

use App\Models\Proyectos;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('informacion proyectos')]
class ProyectoVer extends Component
{
    public Proyectos $proyectos;

    public function render()
    {
        return view('livewire.proyecto.proyecto-ver');
    }
}
