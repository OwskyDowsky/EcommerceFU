<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    use HasFactory;
    public function proyectos()
    {
        return $this->hasMany(Proyectos::class);
    }
    public function productos()
    {
        return $this->hasMany(Productos::class, 'proyecto_id');
    }
}
