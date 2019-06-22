<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NoticiaRequest;
use App\Http\Models\Noticia;
use App\Http\Models\Seccion;
use App\Http\Models\Multimedia;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use Image;
use DB;

class NoticiasController extends Controller
{
    public function all(Request $request){
        $seccion = Seccion::where('titulo',$request->seccion)->first();
        $model = Noticia::select('id','imagen','titulo','created_at')->where('seccion',$seccion->id)->orderBy('id','desc')->get();
        return response()->json($model);
    }

    public function get($id){
        $noticia = Noticia::select('imagen','titulo','resumen','contenido')->where('id',$id)->first();
        $multimedia = Multimedia::select('url','tipo')->where('noticia',$id)->get();
        $fotos = $multimedia->filter(function ($value, $key) {
            return $value->tipo=='foto';
        });
        $video = $multimedia->first(function ($value, $key) {
            return $value->tipo=='video';
        });
        if($fotos->count()>0){
            $datos = collect();
            foreach ($fotos as $foto) {
                $porciones = explode(".", $foto->url);
                $size = Storage::size("$porciones[0]_900.$porciones[1]");
                $mime = Storage::mimeType("$porciones[0]_900.$porciones[1]");
                $datos->push(['url' => $foto->url, 'size' => $size, 'mime' => $mime]);
            }
            $fotos = $datos;
        }
        $multimedia = array(
            'fotos'=>$fotos,
            'video'=>$video
        );
        $noticia = array(
            'noticia'=>$noticia,
            'multimedia'=>$multimedia
        );
        return response()->json($noticia);
    }

    public function add(NoticiaRequest $request){
        try{
            DB::beginTransaction();
            if($request->id!=''){
                $noticia = Noticia::find($request->id);
                if($noticia){ $imagenOld = $noticia->imagen; }
                else{ return response()->json(false); }
                $seccion = substr($request->seccion, 4);
                $seccion = Seccion::where('titulo',$seccion)->first();
            }
            else{
                $noticia = new Noticia();
                $imagenOld = "";
                $seccion = substr($request->seccion, 3);
                $seccion = Seccion::where('titulo',$seccion)->first();
            }
            if($request->file('file')){
                $fecha = Carbon::now()->format('Y-m-d');
                $resize = array(300, 600, 900);
                $imagePath = upImage($request->file('file'),"noticias/$fecha",$resize,$imagenOld,$request->file('filecrop'));
                $noticia->imagen = $imagePath;
            }
            $noticia->titulo = $request->titulo;
            $noticia->resumen = $request->resumen;
            $noticia->contenido = $request->contenido;
            $noticia->seccion = $seccion->id;
            $noticia->usuario = 1;
            $noticia->save();
            if($request->imagenes!=''){
                $imagenes = explode(",", $request->imagenes);
                foreach ($imagenes as $imagen) {
                    $multimedia = new Multimedia();
                    $multimedia->url = $imagen;   
                    $multimedia->tipo = 'foto';  
                    $multimedia->noticia = $noticia->id;  
                    $multimedia->save();
                }
            }
            if($request->imagenesdelete!=''){
                $imagenesdelete = explode(",", $request->imagenesdelete);
                foreach ($imagenesdelete as $imagen) {
                    $multimedia = Multimedia::where('url',$imagen)->first();
                    if($multimedia){
                        $multimedia->delete();
                    }
                    Storage::delete($imagen);
                }
            }
            if($request->video!=''&&$request->id==''){
                $multimedia = new Multimedia();
                $multimedia->url = $request->video;   
                $multimedia->tipo = 'video';  
                $multimedia->noticia = $noticia->id;  
                $multimedia->save(); 
            }
            else if($request->video!=''&&$request->id!=''){
                $multimedia = Multimedia::where('noticia',$request->id)->where('tipo','video')->first();
                if($multimedia){
                    $multimedia->url = $request->video; 
                    $multimedia->save();
                }
                else{
                    $multimedia = new Multimedia();
                    $multimedia->url = $request->video;   
                    $multimedia->tipo = 'video';  
                    $multimedia->noticia = $request->id;  
                    $multimedia->save(); 
                }
            }
            else if($request->video==''&&$request->id!=''){
                $video = Multimedia::where('noticia',$request->id)->where('tipo','video')->first();
                if($video){
                    $video->delete();
                }
            }
            DB::commit();
            return response()->json($noticia->id);
        }
        catch(QueryException $e){
            DB::rollback();
            return $e->getMessage();
        }
    }

    public function remove($id){
        $noticia = Noticia::find($id);
        $resp = false;
        if($noticia){
            Storage::delete($noticia->imagen);
            $noticia->delete();
            $resp = true;
        }
        return response()->json($resp);
    }

    public function uploadGaleria(Request $request){
        $fecha = Carbon::now()->format('Y-m-d');
        $resize = array(900);
        $path = upImage($request->file('file'),"galerias/$fecha",$resize);
        return $path;
    }

    public function getImg($id){
        $noticia = Noticia::find($id);
        return response()->json($noticia->imagen);
    }
}
