<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;

class Categorias extends Model
{
    use HasFactory, LogsActivity;

    protected static $logAttributes = ['nombre', 'descripcion', 'estado'];
    protected static $logName = 'categorias';
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nombre', 'descripcion', 'estado'])
            ->useLogName('categorias')
            ->logOnlyDirty();
    }

    // Método para personalizar los nombres de eventos y traducir las propiedades
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

        // Personaliza las descripciones basadas en los eventos
        $changes = $activity->properties['atributos'] ?? [];

        if (array_key_exists('estado', $changes) && count($changes) == 1) {
            // Solo se cambió el estado
            if ($changes['estado'] === 'activo') {
                $activity->description = 'Categoría activada';
            } elseif ($changes['estado'] === 'inactivo') {
                $activity->description = 'Categoría desactivada';
            }
        } else {
            // Si no es un cambio de estado, maneja los eventos normalmente
            switch ($eventName) {
                case 'created':
                    $activity->description = 'Categoría creada';
                    break;
                case 'updated':
                    $activity->description = 'Categoría actualizada';
                    break;
                case 'deleted':
                    $activity->description = 'Categoría eliminada';
                    break;
            }
        }
    }

    // Relación con productos
    public function productos()
    {
        return $this->hasMany(Productos::class, 'categoria_id'); 
    }

    // Relación con cupones
    public function cupones()
    {
        return $this->hasMany(Cupones::class); 
    }
    
}
