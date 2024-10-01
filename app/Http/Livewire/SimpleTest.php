<?php

namespace App\Http\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('test ecommerce')]
class SimpleTest extends Component
{
    public function render()
    {
        return view('livewire.simple-test');
    }
}

