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
    public function producto()
    {
        return $this->belongsTo(Productos::class); 
    }
}
