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
        return $this->belongsToMany(Productos::class, 'producto_cupon', 'cupon_id', 'producto_id');
    }

    public function categorias()
    {
        return $this->belongsToMany(Categorias::class, 'categoria_cupon', 'cupon_id', 'categoria_id');
    }
}
