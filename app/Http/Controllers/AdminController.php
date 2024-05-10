<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{


    public function showCreateAdminForm(){
        return view('admin/create'); // Vista para el formulario de creación
    }

    public function createAdmin(Request $request){
        // Validar los datos requeridos
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'nombre_usuario' => 'required|string|max:255|unique:users,nombre_usuario', // Nombre de usuario único
            'apellido' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed', // Confirmar la contraseña
            'email' => 'required|email|unique:users,email', // Email único
            'telefono' => 'required|string|max:15',
            'ciudad' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'calle' => 'required|string|max:255',
            'codigo_postal' => 'required|string|max:10',
            'imagen' => 'nullable|image|max:2048', // Imagen opcional
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Crear el nuevo administrador con los datos validados
        $admin = new User();
        $admin->nombre = $request->nombre;
        $admin->nombre_usuario = $request->nombre_usuario;
        $admin->apellido = $request->apellido;
        $admin->email = $request->email;
        $admin->telefono = $request->telefono;
        $admin->ciudad = $request->ciudad;
        $admin->pais = $request->pais;
        $admin->calle = $request->calle;
        $admin->codigo_postal = $request->codigo_postal;
        $admin->password = Hash::make($request->password); // Cifrar la contraseña
        $admin->admin = true; // Asignar privilegios de administrador

        // Manejar la carga de la imagen
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = $imagen->getClientOriginalName(); // Obtener el nombre original del archivo
            $rutaImagen = $imagen->storeAs('admin_images', $nombreImagen, 'public'); // Guardar en 'public/admin_images'

            $admin->imagen = $rutaImagen; // Guardar la ruta en la base de datos
        }

        $admin->save();

        return redirect()->route('admin/create')->with('success', 'Nuevo administrador creado con éxito.');
    }


    public function users(){
        $usuarios = User::all(); // Obtener todos los usuarios
        return view('admin/users', compact('usuarios')); // Pasar la variable 'usuarios' a la vista
    }
    

    public function makeAdmin($id){
        $usuario = User::find($id);
        if ($usuario) {
            $usuario->admin = true; 
            $usuario->save();
            return redirect()->route('admin/users')->with('success', 'Usuario ahora es administrador.');
        }
        return redirect()->back()->with('error', 'Usuario no encontrado.');
    }


}
