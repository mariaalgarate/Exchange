<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{


    public function processForgetPassword(Request $request)
{
    // Validar el campo de correo electrónico
    $request->validate([
        'email' => 'required|string|email',
    ]);

    // Obtener el correo electrónico del usuario
    $email = $request->input('email');

    // Generar una nueva contraseña y hashearla
    $nuevaContrasena = $this->generateNewPassword();
    $hashedNuevaContrasena = Hash::make($nuevaContrasena);

    // Actualizar la contraseña del usuario
    $usuario = User::where('email', $email)->first();

    if ($usuario) {
        $usuario->update(['password' => $hashedNuevaContrasena]);

        // Crear la URL para volver al login
        $loginUrl = route('login'); // Asumiendo que tienes una ruta llamada 'login'

        // Crear el mensaje con el enlace
        $mensaje = "Tu nueva contraseña es: $nuevaContrasena. [Volver al login]($loginUrl)";

        // Devolver la respuesta JSON
        return response()->json(['mensaje' => $mensaje], 200);
    } else {
        return response()->json(['mensaje' => 'Usuario no encontrado.'], 404);
    }
}


    private function generateNewPassword($longitud = 12)
    {
        //Genero la contrasena aleatoria
        $caracteresPermitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $contrasenaAleatoria = '';

        for ($i = 0; $i < $longitud; $i++) {
            $indiceCaracter = rand(0, strlen($caracteresPermitidos) - 1);
            $contrasenaAleatoria .= $caracteresPermitidos[$indiceCaracter];
        }

        return $contrasenaAleatoria;
    }





}