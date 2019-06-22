<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CartelRequest;
use App\Http\Models\Cartel;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use Image;

class CartelesController extends Controller
{
    public function all(){
        $model = Cartel::select('id','imagen','titulo','fecha_fin')->orderBy('id','desc')->get();
        return response()->json($model);
    }

    public function get($id){
        $model = Cartel::select('imagen','titulo','fecha_fin')->where('id',$id)->first();
        return response()->json($model);
    }

    public function add(CartelRequest $request){
        try{
            if($request->id!=''){
                $cartel = Cartel::find($request->id);
                if($cartel){ $imagenOld = $cartel->imagen; }
                else{ return response()->json(false); }
            }
            else{
                $cartel = new Cartel();
                $imagenOld = '';
            }
            if($request->file('file')){
                $fecha = Carbon::now()->format('Y-m-d');
                $imagePath = upImage($request->file('file'),"carteles/$fecha",300,$imagenOld);
                $cartel->imagen = $imagePath;
            }
            $cartel->titulo = $request->titulo;
            $cartel->fecha_fin = $request->fecha_fin;
            $cartel->save();
            return response()->json(true);
        }
        catch(QueryException $e){
            return $e->getMessage();
        }
    }

    public function remove($id){
        $cartel = Cartel::find($id);
        $resp = false;
        if($cartel){
            Storage::delete($cartel->imagen);
            $cartel->delete();
            $resp = true;
        }
        return response()->json($resp);
    }
}
