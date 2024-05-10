<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

        // Atributos que permiten asignación masiva
        protected $fillable = [
            'usuario_id',
            'id_producto',
            'cantidad_producto',
            'precio_total',
            'cupon_descuento',
        ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }


    // Carrito pertenece a un producto
    public function producto() {
        return $this->belongsTo(Producto::class, 'id_producto'); // 'id_producto' es la clave foránea
    }
}
