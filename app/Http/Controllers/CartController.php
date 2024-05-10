<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\Producto;

class CartController extends Controller
{
    public function addToCart(Request $request) {
        $request->validate([
            'id_producto' => 'required|exists:productos,id',
            'cantidad_producto' => 'required|integer|min:1', // Valida que sea un número entero >= 1
        ]);
    
        $producto = Producto::findOrFail($request->id_producto);
    
        // Intentar obtener el carrito o crearlo si no existe
        $carrito = Carrito::firstOrCreate([
            'usuario_id' => auth()->id(),
            'id_producto' => $producto->id,
            'cantidad_producto' => $producto->cantidad,
            'precio_total' => $producto->precio_unitario * $producto->cantidad,
            'cupon_descuento' => 0,
          
        ]);
    
        // Asignar la cantidad del request al carrito
        $cantidad = $request->input('cantidad_producto');
    
    
        // Actualiza la cantidad y el precio total
        $carrito->cantidad_producto = $cantidad;
        $carrito->precio_total = $producto->precio_unitario * $carrito->cantidad_producto;
    
        // Guardar el carrito
        $carrito->save();
    
        return redirect()->route('cart')->with('success', 'Producto agregado al carrito.');
    }


    public function viewCart() {
        $usuario_id = auth()->id();
    
        // Cargar el carrito con la información del producto relacionado
        $carritos = Carrito::where('usuario_id', $usuario_id)
                            ->with('producto') // Cargar la relación 'producto'
                            ->get();
    
        return view('shop.cart', ['carritos' => $carritos]);
    }




    public function removeFromCart($id) {
        $carrito = Carrito::find($id);
    
        if ($carrito && $carrito->usuario_id == auth()->id()) {
            $carrito->delete(); // Eliminar el producto del carrito
            return redirect()->route('cart')->with('success', 'Producto eliminado del carrito.');
        } else {
            return redirect()->route('cart')->with('error', 'Producto no encontrado o no tienes permiso para eliminarlo.');
        }
    }
}