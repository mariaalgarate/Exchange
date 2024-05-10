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
        //Valido
        $request->validate([
            'email' => 'required|string',
        ]);

        $email = $request->input('email');
        $nuevaContrasena = $this->generateNewPassword();
        $hashedNuevaContrasena = Hash::make($nuevaContrasena);

        //Actualizo la contraseña (hasheada)
        User::where('email', $email)->update(['password' => $hashedNuevaContrasena]);

        $mensaje = "Tu nueva contraseña es: $nuevaContrasena";
        return response()->json(['mensaje' => $mensaje], 200);
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