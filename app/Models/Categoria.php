<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'categorias_productos', 'categoria_id', 'producto_id');
    }
}
