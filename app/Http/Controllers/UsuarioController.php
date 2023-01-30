<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{

    //funcion para mostrar el inicio de sesion (la vista)
    public function viewlogin(){

        return view('login.login');
    }
    
    /*
    public function hashprueba(){

        $hasedPw = Hash::make('12345');

        echo $hasedPw;
    }
    */

 

    public function autenticacion(Request $request){
        //validaciones......


        $credenciales = [
            'email' => $request->usuario,
            'password' => $request->contra
        ];

        if(Auth::attempt($credenciales)){
            
            session([
                'Llave' => 'valor'
            ]);

            return response()->json([
                'error' => false,
                'mensaje'=>'Acceso Correcto'
            ]);
        }else{
            return response()->json([
                'error' => true,
                'mensaje'=>'Usuario no encontrado'
            ]);
        }

    }


}
