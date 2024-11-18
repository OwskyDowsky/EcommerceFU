<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public function ventas(){
        return $this->belongsToMany(Ventas::class, 'item_ventas')->withPivot('qty', 'fecha');
    }
}
