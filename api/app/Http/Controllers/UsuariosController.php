<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Usuario;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use Image;
use DB;

class UsuariosController extends Controller
{
    public function all(){
        $model = Usuario::select('id','foto','nombre','usuario','password')->first();
        return response()->json($model);
    }
    
    public function add(UsuarioRequest $request){
        try{
            $usuario = Usuario::find(1);
            $imagenOld = $usuario->foto;
            if($request->file('file')){
                $fecha = Carbon::now()->format('Y-m-d');
                $imagePath = upImage($request->file('file'),"usuario/$fecha",300,$imagenOld);
                $usuario->foto = $imagePath;
            }
            $usuario->nombre = $request->nombre;
            $usuario->usuario = $request->usuario;
            $usuario->password = $request->contraseña;
            $usuario->save();
            return response()->json(true);
        }
        catch(QueryException $e){
            return $e->getMessage();
        }
    }

    public function create(Request $request){
        $salt = $this->getSalt();
        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->usuario = $request->usuario;
        $usuario->password = sha1(md5($salt.$request->password));
        $usuario->roll = $request->roll;
        $usuario->salt = $salt;
        $usuario->foto = 'recursos/usuario.png';
        $usuario->save();
    }

    public function getSalt(){
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20); 
    }
}
