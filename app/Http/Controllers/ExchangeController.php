<?php

namespace App\Http\Controllers;

use App\Mail\ExchangeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InteresProducto;
use App\Mail\TestLaravelMail;
use App\Models\Product;
use App\Models\User;
use App\Models\Producto;

class ExchangeController extends Controller
{


    public function showExchange($id)
    {
        $producto = Producto::findOrFail($id);
        return view('product/exchange-product', [
            'producto' => $producto
        ]);
    }


    public function confirmExchange($id)
    {
        $producto = Producto::findOrFail($id);
        return view('product/confirmExchange', [
            'producto' => $producto
        ]);
    }

public function uploadExchange(Request $request)
{
    // Validar la solicitud
    $request->validate([
        'nombre' => 'required|string',
        'descripcion' => 'required|string',
        'estado' => 'required|in:Muy Bueno,Bueno,Desgastado',
        'precio_unitario' => 'required|numeric',
        'cantidad' => 'required|integer|min:1',
        'imagen' => 'required|file',
    ]);

    // Crear un nuevo producto
    $producto = new Producto();
    $producto->nombre = $request->nombre;
    $producto->descripcion = $request->descripcion;
    $producto->estado = $request->estado;
    $producto->precio_unitario = $request->precio_unitario;
    $producto->cantidad = $request->cantidad;
    $producto->stock = '0';
    $producto->transaccion = 'Intercambio';
    $producto->usuario_id = auth()->id(); // ID del usuario autenticado
    
    // Guardar la imagen y asignar la ruta al producto
    if ($request->hasFile('imagen')) {
        $path = $request->file('imagen')->store('imgs/', 'public');
        $producto->imagen = $path; // Asignar la ruta de la imagen
    }

    // Guardar el producto
    $producto->save();

    // Obtener información del vendedor y el producto
    $vendedor = auth()->user(); // El usuario que subió el producto
    $interesado = auth()->user(); // El mismo, ya que es el que subió el producto
    
    // Enviar correo al vendedor sobre el interés en su producto
    Mail::to($vendedor->email)->send(new TestLaravelMail($vendedor, $interesado, $producto));
    
    // Redirigir con un mensaje de éxito
    return redirect()->route('confirmExchange', ['id' => $producto->id])->with('success', '¡Producto para intercambio registrado con éxito!');
}





    



}
