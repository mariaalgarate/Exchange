<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_envio',
        'estado_pago',
        'precio_total',
        'direccion_envio',
        'id_producto',
        'usuario_id',
        'id_pago'

    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function pago()
    {
        return $this->belongsTo(Pago::class, 'id_pago');
    }
}
