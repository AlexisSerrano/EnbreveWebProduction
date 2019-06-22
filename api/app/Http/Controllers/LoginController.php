<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Usuario;

class LoginController extends Controller
{
    public function login(Request $request){
        $pass = $request->pass;
        $usuario = $request->usuario;
        $usuariobd = Usuario::select('nombre','usuario','foto','password','salt')->where('usuario',$usuario)->first();
        if($usuariobd && $usuariobd->password==sha1(md5($usuariobd->salt.$pass))){
            $usuario = array(
                'nombre'=>$usuariobd->nombre,
                'usuario'=>$usuariobd->usuario,
                'foto'=>$usuariobd->foto,
            );
            $token = $usuariobd->salt;
            $data = array(
                'usuario'=>$usuario,
                'token'=>$token
            );
            return response()->json($data);
        }
        else{
            return response()->json(false);
        }
    }

    public function logout(Request $request){

    }
}
