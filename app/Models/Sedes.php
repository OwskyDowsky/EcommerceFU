<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sedes extends Model
{
    use HasFactory;
    public function sedes()
    {
        return $this->hasMany(Sedes::class); 
    }
}
