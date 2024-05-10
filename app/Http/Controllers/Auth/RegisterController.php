<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';



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
            $rutaImagen = $imagen->storeAs('user_images', $nombreImagen, 'public'); // Guardar en 'public/user_images'
            $user->imagen = $rutaImagen; // Guardar la ruta de la imagen
        }

        // Guardar el usuario en la base de datos
        $user->save();

        // Redireccionar después de crear el usuario
        return redirect($this->redirectTo)->with('success', 'Usuario creado exitosamente');
    }
}
