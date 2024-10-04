<?php

namespace App\Livewire\Activitylogs;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;
use Spatie\Activitylog\Models\Activity;

#[Title('Logs')]
class LogsComponent extends Component
{
    use WithPagination;

    public $search = ''; // Término de búsqueda
    public $cant = 10; // Cantidad de registros por página

    public function render()
    {
        // Realiza la búsqueda y la paginación en la tabla de logs de actividad
        $logs = Activity::where('description', 'like', "%{$this->search}%")
            ->orWhere('causer_type', 'like', "%{$this->search}%")
            ->orWhere('causer_id', 'like', "%{$this->search}%")
            ->orderBy('id', 'desc')
            ->paginate($this->cant);

        return view('livewire.activitylogs.logs-component', [
            'logs' => $logs,
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage(); // Reinicia la paginación cuando se actualiza la búsqueda
    }
}
