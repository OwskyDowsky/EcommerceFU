<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupones extends Model
{
    use HasFactory;
    public function categoria()
    {
        return $this->belongsTo(Categorias::class); 
    }
    public function productos()
    {
        return $this->belongsToMany(Productos::class);
    }

    public function categorias()
    {
        return $this->belongsToMany(Categorias::class);
    }

    // Relación con cupones
    public function ventas()
    {
        return $this->hasMany(Ventas::class); // Esto indica que un cupón puede estar en muchas ventas
    }
}
