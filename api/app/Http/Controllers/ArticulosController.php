<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticuloRequest;
use App\Http\Models\Articulo;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use Image;
use DB;

class ArticulosController extends Controller
{
    public function all(){
        $model = DB::table('articulos')
			->join('autores','articulos.autor','=','autores.id')
			->select('articulos.id','articulos.imagen','articulos.titulo','articulos.resumen','articulos.contenido','autores.nombre','autores.primer_ap','autores.segundo_ap')->orderBy('id','desc')->get();
        return response()->json($model);
    }

    public function get($id){
        $model = Articulo::select('imagen','titulo','resumen','contenido','autor')->where('id',$id)->first();
        return response()->json($model);
    }

    public function add(ArticuloRequest $request){
        try{
            if($request->id!=''){
                $articulo = Articulo::find($request->id);
                if($articulo){ $imagenOld = $articulo->imagen; }
                else{ return response()->json(false); }
            }
            else{
                $articulo = new Articulo();
                $imagenOld = "";
            }
            if($request->file('file')){
                $fecha = Carbon::now()->format('Y-m-d');
                $resize = array(300, 600, 900);
                $imagePath = upImage($request->file('file'),"articulos/$fecha",$resize,$imagenOld);
                $articulo->imagen = $imagePath;
            }
            $articulo->titulo = $request->titulo;
            $articulo->resumen = $request->resumen;
            $articulo->contenido = $request->contenido;
            $articulo->autor = $request->autor;
            $articulo->save();
            return response()->json(true);
        }
        catch(QueryException $e){
            return $e->getMessage();
        }
    }

    public function remove($id){
        $articulo = Articulo::find($id);
        $resp = false;
        if($articulo){
            Storage::delete($articulo->imagen);
            $articulo->delete();
            $resp = true;
        }
        return response()->json($resp);
    }
}
