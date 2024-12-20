<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;
    public function clientes()
    {
        return $this->belongsTo(Clientes::class);
    }
    public function items(){
        return $this->belongsToMany(Item::class)->withPivot(['qty','fecha']);
    }
    public function cupones()
    {
        return $this->belongsTo(Cupones::class, 'cupon_id'); 
    }
}
