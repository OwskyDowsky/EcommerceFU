<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;

class Productos extends Model
{
    use HasFactory, LogsActivity;

    protected static $logAttributes = ['nombre', 'descripcion', 'precio', 'estado', 'categoria_id', 'proyecto_id', 'stock', 'sede_id'];
    protected static $logName = 'productos';
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nombre', 'descripcion', 'precio', 'estado', 'categoria_id', 'proyecto_id', 'stock', 'sede_id'])
            ->useLogName('productos')
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
                $activity->description = 'Producto activado';
            } elseif ($changes['estado'] === 'inactivo') {
                $activity->description = 'Producto desactivado';
            }
        } else {
            // Si no es un cambio de estado, maneja los eventos normalmente
            switch ($eventName) {
                case 'created':
                    $activity->description = 'Producto creado';
                    break;
                case 'updated':
                    $activity->description = 'Producto actualizado';
                    break;
                case 'deleted':
                    $activity->description = 'Producto eliminado';
                    break;
            }
        }
    }
    //relacion poliformica
    public function image(){
        return $this->morphOne('App\Models\Image','imageable');
    }
    protected function imagen(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->image ? Storage::url('public/' . $this->image->url) : asset
                ('no-image.png');
            }
        );
    }
    //modelos relacionados recibir
    public function categoria()
    {
        return $this->belongsTo(Categorias::class); 
    }
    public function sede()
    {
        return $this->belongsTo(Sedes::class); 
    }
    public function proyecto()
    {
        return $this->belongsTo(Proyectos::class); 
    }
    //mandar
    public function cupones()
    {
        return $this->hasMany(Cupones::class); 
    }
}
