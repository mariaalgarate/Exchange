<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Resena;
use App\Models\Categoria;
use App\Models\User;
use App\Mail\TestLaravelMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller

{


    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'estado' => 'required|in:Muy bueno,Bueno,Desgastado',
            'precio_unitario' => 'required|numeric|min:0|max:10000',
            'stock' => 'required|integer|min:0|max:10000',
            'cantidad' => 'required|integer|min:1|max:2',
            'transaccion' => 'required|in:Intercambio,Venta,Ambas',
            'imagen' => 'required|image|max:2048', // Imagen opcional


        ]);


        // Crear un nuevo producto con los datos recibidos del formulario
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->estado = $request->estado;
        $producto->precio_unitario = $request->precio_unitario;
        $producto->stock = $request->stock;
        $producto->cantidad = $request->cantidad;
        $producto->transaccion = $request->transaccion; // Asignar el tipo de transacción
        $producto->usuario_id = auth()->id(); // Asignar el ID del usuario autenticado


        // Manejar la carga de la imagen si está presente
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = $imagen->getClientOriginalName(); // Obtener el nombre original
            $rutaImagen = 'product_images/' . $nombreImagen;
            $imagen->move(public_path('product_images'), $nombreImagen); // Guardar en 'public/product_images'
            $producto->imagen = $rutaImagen; // Guardar la ruta de la imagen
        }
        // Guardar el producto en la base de datos
        $producto->save();

        //Actualizar categorias asociadas al producto
        if ($request->has('categorias')) {
            $producto->categorias()->sync($request->categorias);
        }

        // Redirigir a alguna página después de guardar el producto
        return redirect()->route('my-products')->with('success', '¡Producto creado correctamente!');
    }



    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all(); // Obtén todas las categorías
        return view('product/edit-product', [
            'producto' => $producto,
            'categorias' => $categorias // Pasa las categorías a la vista
        ]);
    }

    public function update(Request $request, $id)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'estado' => 'required|in:Muy Bueno,Bueno,Desgastado',
            'precio_unitario' => 'required|numeric|min:0|max:10000',
            'stock' => 'required|integer|min:0|max:10000',
            'cantidad' => 'required|integer|min:0|max:2',
            'transaccion' => 'required|in:Venta,Intercambio,Ambas',
            'imagen' => 'nullable|image|max:2048',
        ]);

        // Encuentra el producto por su ID
        $producto = Producto::findOrFail($id);

        // Manejar la carga de la imagen si está presente
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = $imagen->getClientOriginalName(); // Obtener el nombre original
            $rutaImagen = $imagen->storeAs('product_images', $nombreImagen, 'public'); // Guardar en 'public/product_images'
            $producto->imagen = $rutaImagen; // Guardar la ruta de la imagen
        }
        // Actualiza los datos del producto con los datos recibidos del formulario
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->estado = $request->estado;
        $producto->precio_unitario = $request->precio_unitario;
        $producto->stock = $request->stock;
        $producto->cantidad = $request->cantidad;
        $producto->transaccion = $request->transaccion;

        // Guardar las categorías seleccionadas
        if ($request->has('categorias')) {
            $producto->categorias()->sync($request->categorias);
        }

        $producto->save();

        // Redirige a alguna página después de guardar los cambios
        return redirect()->route('my-products')->with('success', '¡Producto actualizado exitosamente!');
    }



    public function exploreProducts()
    {
        $productos = Producto::all(); // Recuperar todos los productos de la base de datos
        return view('actions/buy', ['productos' => $productos]);
    }

    public function delete($id)
    {
        $producto = Producto::findOrFail($id);
        return view('product/delete-product', [
            'producto' => $producto
        ]);
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        // Eliminar las reseñas asociadas
        $producto->resenas()->delete();

        // Eliminar los registros en la tabla 'pedidos' que referencian el producto a través de 'pagos'
        DB::table('pedidos')->where('id_producto', $id)->delete();
        // Eliminar referencias en carritos
        DB::table('carritos')->where('id_producto', $id)->delete();

        // Ahora puedes eliminar el producto
        $producto->delete();

        return redirect()->route('my-products')->with('success', '¡Producto eliminado exitosamente!');
    }





    public function addComment(Request $request)
    {
        // Crear la nueva reseña
        $resena = new Resena();
        $resena->comentario = $request->comentario;
        $resena->valoracion = $request->valoracion;
        $resena->id_producto = $request->id; // Asigna el ID del producto al que pertenece la reseña
        $resena->usuario_id = auth()->id(); // Asigna el ID del usuario que envió la reseña

        // Guardar la reseña en la base de datos
        if ($resena->save()) {
            return redirect()->route('show', ['id' => $request->id]); //Utilizo $request->id para redirigir a la vista de la prod$producto
        } else {
            return back()->with('error', 'Error al agregar la reseña');
        }
    }


    public function search(Request $request)
    {
        $query = $request->input('query'); // Obtener el término de búsqueda
        $products = Producto::where('nombre', 'LIKE', '%' . $query . '%')->get(); // Buscar productos cuyo nombre contiene el término

        return view('product.search', ['products' => $products, 'query' => $query]);
    }


    public function show($id)
    {
        $producto = Producto::find($id); // Busca el producto por ID
        if (!$producto) {
            return redirect()->route('actions/my-products')->with('error', 'Producto no encontrado'); // Si no se encuentra, redirige
        }

        // Verificar si el correo electrónico ha sido enviado
        $correoEnviado = false;
        $usuario_id = $producto->usuario_id;
        $destinatario = User::find($usuario_id);

        try {
            // Lógica para enviar el correo electrónico
            Mail::to($destinatario->email)->send(new TestLaravelMail($destinatario, $producto));
            $correoEnviado = true;
        } catch (\Exception $e) {
            // Captura cualquier excepción que ocurra durante el envío del correo
            $correoEnviado = false;
            // Aquí puedes registrar el error o manejarlo de alguna otra manera según tus necesidades
        }

        // Si el producto se encuentra, pasa el producto y la variable de correo enviado a la vista
        return view('product/show', [
            'producto' => $producto,
            'correoEnviado' => $correoEnviado,
        ]);
    }
}
