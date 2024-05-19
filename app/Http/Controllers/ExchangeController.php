<?php

namespace App\Http\Controllers;

use App\Mail\AcceptNotification;
use App\Mail\ExchangeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestLaravelMail;
use App\Models\Producto;
use App\Models\User;
use App\Mail\RejectionNotification;


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

    public function uploadExchange(Request $request, $id)
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


        // Buscar el producto utilizando el ID proporcionado en la URL
        $producto = Producto::find($id);

        // Verificar si el producto existe
        if ($producto) {
            // Obtener el ID del usuario que subió este producto
            $usuario_id = $producto->usuario_id;
            // Buscar al usuario correspondiente en la base de datos
            $destinatario = User::find($usuario_id);

            // Verificar si se encontró al destinatario
            if ($destinatario) {
                // Enviar el correo electrónico al destinatario
                Mail::to($destinatario->email)->send(new TestLaravelMail($destinatario, $producto));

                // Redirigir con un mensaje de éxito
                return redirect()->route('confirmExchange', ['id' => $producto->id])->with('success', '¡Producto para intercambio registrado con éxito!');
            } else {
                // Manejar el caso en que no se encuentre al destinatario
                return back()->with('error', 'No se pudo encontrar al destinatario del correo electrónico.');
            }
        } else {
            // Manejar el caso en que no se encuentre el producto
            return back()->with('error', 'El producto no fue encontrado.');
        }
    }



    public function rejectExchange($id)
    {
        // Encuentra el producto por ID
        $producto = Producto::find($id);
    
        if (!$producto) {
            return redirect()->route('actions/my-products')->with('error', 'Producto no encontrado');
        }
    
        // Encuentra al usuario correspondiente
        $usuario_id = $producto->usuario_id;
        $user = User::find($usuario_id);
    
        // Envía el correo electrónico de notificación de rechazo
        Mail::to($user->email)->send(new RejectionNotification($user, $producto));
    
        // Redirige a la vista de confirmación de rechazo
        return view('exchange/rejectExchange', [
            'producto' => $producto
        ]);
    }

    public function rejectExchangeShow($id)
    {
        $producto = Producto::findOrFail($id);
        return view('exchange/rejectExchange', [
            'producto' => $producto
        ]);
    }


    public function acceptExchangeShow($id)
    {
        $producto = Producto::findOrFail($id);
        return view('exchange/acceptExchange', [
            'producto' => $producto
        ]);
    }


    public function acceptExchange($id)
{
    // Encuentra el producto por ID
    $producto = Producto::find($id);

    if (!$producto) {
        return redirect()->route('actions/my-products')->with('error', 'Producto no encontrado');
    }

    // Encuentra al usuario vendedor
    $vendedor = User::find($producto->usuario_id);

    // Aquí necesitas la lógica para encontrar al comprador
    // Supongamos que el comprador sube un producto con su id que referencia al producto original
    $compradorProducto = Producto::where('id', $id)->first();
    if (!$compradorProducto) {
        return redirect()->route('actions/my-products')->with('error', 'Producto de intercambio no encontrado');
    }

    $comprador = User::find($compradorProducto->usuario_id);

    // Envía el correo electrónico de notificación de aceptación del intercambio a ambos usuarios
    Mail::to($vendedor->email)->send(new AcceptNotification($vendedor, $producto, $comprador));
    Mail::to($comprador->email)->send(new AcceptNotification($comprador, $producto, $vendedor));

    // Redirige a la vista de confirmación de aceptación del intercambio
    return view('exchange/acceptExchange', [
        'producto' => $producto
    ]);
}
}
