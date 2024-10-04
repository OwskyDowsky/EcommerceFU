<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;

class Sedes extends Model
{
    use HasFactory, LogsActivity;

    protected static $logAttributes = ['nombre', 'ubicacion'];
    protected static $logName = 'sedes';
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nombre', 'ubicacion'])
            ->useLogName('sedes')
            ->logOnlyDirty();
    }

    // Método para personalizar los nombres de eventos
    public function tapActivity(Activity $activity, string $eventName)
    {
        // Traduce las claves 'attributes' y 'old' a 'atributos' y 'anterior'
        $properties = $activity->properties->toArray();

        if (isset($properties['attributes'])) {
            $properties['atributos'] = $properties['attributes']; // Traduce 'attributes' a 'atributos'
            unset($properties['attributes']);
        }

        if (isset($properties['old'])) {
            $properties['anterior'] = $properties['old']; // Traduce 'old' a 'anterior'
            unset($properties['old']);
        }

        // Reemplaza las propiedades modificadas
        $activity->properties = collect($properties);
        
        // Obtén las propiedades cambiadas
        $changes = $activity->properties['atributos'] ?? [];

        if (array_key_exists('estado', $changes) && count($changes) == 1) {
            // Solo se cambió el estado
            if ($changes['estado'] === 'activo') {
                $activity->description = 'Sede activada';
            } elseif ($changes['estado'] === 'inactivo') {
                $activity->description = 'Sede desactivada';
            }
        } else {
            // Si no es un cambio de estado, maneja los eventos normalmente
            switch ($eventName) {
                case 'created':
                    $activity->description = 'Sede creada';
                    break;
                case 'updated':
                    $activity->description = 'Sede actualizada';
                    break;
                case 'deleted':
                    $activity->description = 'Sede eliminada';
                    break;
            }
        }
    }

    public function sedes()
    {
        return $this->hasMany(Sedes::class); 
    }
}
