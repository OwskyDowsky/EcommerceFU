<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Productos extends Model
{
    use HasFactory;
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
    //modelos relacionados
    public function categorias()
    {
        return $this->belongsTo(Categorias::class); 
    }
    public function sedes()
    {
        return $this->belongsTo(Sedes::class); 
    }
    public function proyectos()
    {
        return $this->belongsTo(Proyectos::class); 
    }
}
