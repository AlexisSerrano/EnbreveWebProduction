<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Banner;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use Image;

class BannersController extends Controller
{
    public function all(){
        $model = Banner::select('id','imagen','fecha_inicio','fecha_fin','posicion','estatus','empresa')->orderBy('id','desc')->get();
        return response()->json($model);
    }

    public function get($id){
        $model = Banner::select('imagen','empresa','fecha_inicio','fecha_fin','posicion','estatus')->where('id',$id)->first();
        return response()->json($model);
    }

    public function add(BannerRequest $request){
        try{
            if($request->id!=''){
                $banner = Banner::find($request->id);
                if($banner){ $imagenOld = $banner->imagen; }
                else{ return response()->json(false); }
            }
            else{
                $banner = new Banner();
                $imagenOld = '';
            }
            if($request->file('file')){
                $width = $this->getWidth($request->posicion);
                $fecha = Carbon::now()->format('Y-m-d');
                $imagePath = upImage($request->file('file'),"banners/$fecha",$width,$imagenOld);
                $banner->imagen = $imagePath;
            }
            $banner->empresa = $request->empresa;
            $banner->fecha_inicio = $request->fecha_inicio;
            $banner->fecha_fin = $request->fecha_fin;
            $banner->posicion = $request->posicion;
            $banner->estatus = $request->estatus;

            Banner::where('estatus', 1)->where('posicion', $request->posicion)->update(['estatus' => 0]);

            $banner->save();
            return response()->json(true);
        }
        catch(QueryException $e){
            return $e->getMessage();
        }
    }

    public function remove($id){
        $banner = Banner::find($id);
        $resp = false;
        if($banner){
            Storage::delete($banner->imagen);
            $banner->delete();
            $resp = true;
        }
        return response()->json($resp);
    }

    public function getWidth($posicion){
        $width = '';
        switch ($posicion) {
            case ($posicion == 1 || $posicion == 8 || $posicion==14):
                $width = 1200;
                break;
            case ($posicion == 2 || $posicion == 3 || $posicion==4 || $posicion==5 || $posicion==6 || $posicion==7 || $posicion==12 || $posicion==13 || $posicion==18 || $posicion==19):
                $width = 600;
                break;
            case ($posicion == 9 || $posicion == 10 || $posicion==11 || $posicion==15 || $posicion==16 || $posicion==17):
                $width = 300;
                break;
        }
        return $width;
    }
}
