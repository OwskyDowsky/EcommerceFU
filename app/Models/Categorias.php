<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Categorias extends Model
{
    use HasFactory, LogsActivity;

    // Configurar los atributos que quieres que se registren
    protected static $logAttributes = ['nombre', 'descripcion', 'estado'];
    protected static $logName = 'categorias';

    // Solo registra los cambios (evita registrar si no hay cambios)
    protected static $logOnlyDirty = true;

    // Implementar el método getActivitylogOptions
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nombre', 'descripcion', 'estado']) // Atributos a registrar
            ->useLogName('categorias')            // Nombre del log
            ->logOnlyDirty();                     // Registrar solo los cambios
    }

    public function productos()
    {
        return $this->hasMany(Productos::class, 'categoria_id'); 
    }

    public function cupones()
    {
        return $this->hasMany(Cupones::class); 
    }
}
