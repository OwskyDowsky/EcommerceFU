<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;
    public function productos()
    {
        return $this->hasMany(Productos::class, 'categoria_id'); 
    }
    public function cupones()
    {
        return $this->hasMany(Cupones::class); 
    }
}
