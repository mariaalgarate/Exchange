<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Pago;
use App\Models\Envio;
use App\Models\Pedido;
use Illuminate\Http\Request;

use PDF; 

class PurchaseController extends Controller
{
    public function showPurchase($id)
    {
            $producto = Producto::findOrFail($id);
            return view('product/purchase', [
                'producto' => $producto
            ]);
    }

    public function verifyPurchase($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('product/verifyPurchase', [
            'pedido' => $pedido
        ]);
    }


    public function processPurchase(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
    
        // Obtener los costos de envío según el tipo de envío seleccionado
        $costoEnvio = 0;
        if ($request->tipo_envio === 'Estándar') {
            $costoEnvio = 1.50;
        } elseif ($request->tipo_envio === 'Express') {
            $costoEnvio = 3.50;
        }
    
        // Calcular el precio total con el costo de envío
        $precioTotal = $producto->precio_unitario + $costoEnvio;
    
        // Crear un registro de pago
        $pago = new Pago([
            'estado' => $request->estado,
            'producto_id' => $producto->id,
        ]);
        $pago->save();
    
        // Crear un registro de envío
        $envio = new Envio([
            'empresa_paqueteria' => $request->empresa_paqueteria,
            'tipo_envio' => $request->tipo_envio,
            'zona_entrega' => $request->zona_entrega,
            'usuario_id' => auth()->user()->id,
            'producto_id' => $producto->id,
            'id_pago' => $pago->id,
        ]);
        $envio->save();
    
        // Crear un registro de pedido
        $pedido = new Pedido([
            'tipo_envio' => $request->tipo_envio,
            'estado_pago' => 'Pagado',
            'precio_total' => $precioTotal,
            'direccion_envio' => $request->zona_entrega,
            'id_producto' => $producto->id,
            'usuario_id' => auth()->user()->id,
            'id_pago' => $pago->id,
        ]);
        $pedido->save();
    
        // Redirigir al usuario a la página de confirmación de compra, pasando el ID del pedido
        return redirect()->route('verifyPurchase', ['id' => $pedido->id]);
    }



    public function downloadPDF($id)
{
    // Obtener el pedido por su ID
    $pedido = Pedido::findOrFail($id);

    // Crear una instancia de PDF y cargar la vista
    $pdf = PDF::loadView('product.invoice', ['pedido' => $pedido]);

    // Devolver el PDF como archivo descargable
    return $pdf->download('factura_' . $pedido->id . '.pdf');
}
  
}
