<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Producto;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller{

    public function register(Request $request)
    {
        // Validación del formulario de registro
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'nombre_usuario' => 'required|string|max:255|unique:users,nombre_usuario', // Nombre de usuario único
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // Email único
            'password' => 'required|string|min:8|confirmed', // Confirmación de contraseña
            'telefono' => 'required|string|max:15',
            'ciudad' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'calle' => 'required|string|max:255',
            'codigo_postal' => 'required|string|max:10',
            'imagen' => 'nullable|image|max:2048', // Imagen opcional
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(); // Redireccionar si hay errores
        }

        // Crear una nueva instancia de User con los datos validados
        $user = new User();
        $user->nombre = $request->nombre;
        $user->nombre_usuario = $request->nombre_usuario;
        $user->apellido = $request->apellido;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->ciudad = $request->ciudad;
        $user->pais = $request->pais;
        $user->calle = $request->calle;
        $user->codigo_postal = $request->codigo_postal;
        $user->password = Hash::make($request->password); // Cifrar la contraseña
        $user->admin = false; // No es administrador por defecto

      // Manejar la carga de la imagen si está presente
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = $imagen->getClientOriginalName(); // Obtener el nombre original
            $rutaImagen = 'user_images/' . $nombreImagen; // Ruta relativa
            $imagen->move(public_path('user_images'), $nombreImagen); // Mover a 'public/user_images'
            $user->imagen = $rutaImagen; // Guardar la ruta de la imagen en la base de datos
        }
        else {
            // Establecer una imagen por defecto
            $rutaImagenPorDefecto = '../imgs/avatar.png'; // Ruta de la imagen por defecto
            $user->imagen = $rutaImagenPorDefecto;
        }
       

        // Guardar el usuario en la base de datos
        $user->save();

        // Redireccionar después de crear el usuario
        return redirect()->route('login')->with('success', 'Nuevo usuario creado con éxito.');
    }





    public function updateProfile(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'nombre_usuario' => 'required|string|max:255|unique:users,nombre_usuario,' . auth()->id(),
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'telefono' => 'required|string|max:15', // Ajustado para un formato de teléfono común
            'ciudad' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'calle' => 'required|string|max:255',
            'codigo_postal' => 'required|string|max:10', // Reducido a un formato común de código postal
            'imagen' => 'nullable|image|max:2048', // Imagen opcional
        ]);
    
        $user = auth()->user(); // Obtener el usuario autenticado
    
        // Manejar la carga de la imagen si está presente
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = $imagen->getClientOriginalName(); // Obtener el nombre original
            $rutaImagen = 'user_images/' . $nombreImagen; // Ruta relativa
            $imagen->move(public_path('user_images'), $nombreImagen); // Mover a 'public/user_images'
            $user->imagen = $rutaImagen; // Guardar la ruta de la imagen en la base de datos
        }
    
        // Asignación de campos específicos
        $user->nombre = $request->nombre;
        $user->nombre_usuario = $request->nombre_usuario;
        $user->apellido = $request->apellido;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->ciudad = $request->ciudad;
        $user->pais = $request->pais;
        $user->calle = $request->calle;
        $user->codigo_postal = $request->codigo_postal;
    
        // Guardar cambios
        $user->save();
    
        // Redireccionar a la página de perfil con un mensaje de éxito
        return redirect()->route('show-profile')->with('success', 'Perfil actualizado correctamente.');
    }
    


    public function delete(Request $request){
        // Eliminar la cuenta del usuario
        $request->user()->delete();

        // Redirigir a una página de confirmación o a donde desees
        return redirect()->route('home')->with('success', '¡Tu cuenta ha sido eliminada correctamente!');
    }



    public function showUserProducts(){
    // Obtener el ID del usuario autenticado
    $userId = auth()->id();

    // Obtener productos del usuario
    $productos = Producto::where('usuario_id', $userId)->get();
    return view('actions/my-products', ['productos' => $productos]);
}


}



