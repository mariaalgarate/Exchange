<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categorias_productos', 'producto_id', 'categoria_id');
    }

    public function usuario(){
        return $this->belongsTo(User::class,'id_usuario');
    }

    public function resenas()
    {
        return $this->hasMany(Resena::class, 'id_producto');
    }

    // Si un producto tiene un pago asociado
    public function pago()
    {
        return $this->hasOne(Pago::class);
    }

    // Si un producto puede tener un envío
    public function envio()
    {
        return $this->hasOne(Envio::class);
    }

    public function carrito()
    {
        return $this->belongsTo(Carrito::class, 'id_producto'); // 'id_producto' debería ser la clave foránea en 'productos'
    }
}
