<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'empresa_paqueteria',
        'tipo_envio',
        'zona_entrega',
        'usuario_id',
        'producto_id', 
        'id_pago',
    ];
    
    public function pago()
    {
        return $this->belongsTo(Pago::class, 'id_pago');
    }


    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
