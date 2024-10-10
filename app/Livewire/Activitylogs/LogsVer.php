<?php

namespace App\Livewire\Activitylogs;

use Livewire\Component;
use Livewire\Attributes\Title;
use Spatie\Activitylog\Models\Activity;

#[Title('Ver Logs')]
class LogsVer extends Component
{
    public Activity $log;

    public function mount(Activity $log)
    {
        $this->log = $log;
    }

    public function render()
    {
        return view('livewire.activitylogs.logs-ver');
    }
}
