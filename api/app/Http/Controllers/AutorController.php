<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Autor;
use App\Http\Requests\AutorRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use Image;
use DB;

class AutorController extends Controller
{
    public function all(){
        $model = Autor::select('id','foto','nombre','primer_ap','segundo_ap')->orderBy('id','desc')->get();
        return response()->json($model);
    }

    public function get($id){
        $model = Autor::select('foto','nombre','primer_ap','segundo_ap','descripcion','facebook','twitter','instagram')->where('id',$id)->first();
        return response()->json($model);
    }

    public function add(AutorRequest $request){
        try{
            if($request->id!=''){
                $autor = Autor::find($request->id);
                if($autor){ $imagenOld = $autor->foto; }
                else{ return response()->json(false); }
            }
            else{
                $autor = new Autor();
                $imagenOld = "";
                $autor->foto = "autores/default.png";
            }
            if($request->file('file')){
                $fecha = Carbon::now()->format('Y-m-d');
                $imagePath = upImage($request->file('file'),"autores/$fecha",300,$imagenOld);
                $autor->foto = $imagePath;
            }
            $autor->nombre = $request->nombre;
            $autor->primer_ap = $request->primer_ap;
            $autor->segundo_ap = $request->segundo_ap;
            $autor->descripcion = $request->descripcion;
            $autor->facebook = $request->facebook;
            $autor->instagram = $request->instagram;
            $autor->twitter = $request->twitter;
            $autor->save();
            return response()->json(true);
        }
        catch(QueryException $e){
            return $e->getMessage();
        }
    }

    public function remove($id){
        $autor = Autor::find($id);
        $resp = false;
        if($autor){
            Storage::delete($autor->foto);
            $autor->delete();
            $resp = true;
        }
        return response()->json($resp);
    }

    public function getAutores(){
        $query = DB::raw("CONCAT(nombre,' ',primer_ap,' ',segundo_ap) as nombre");
        $model = Autor::select('id',$query)->orderBy('nombre','asc')->get();
        return response()->json($model);
    }
}
