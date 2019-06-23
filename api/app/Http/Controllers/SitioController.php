<?php

namespace App\Http\Controllers;
use App\Http\Models\Noticia;
use App\Http\Models\Articulo;

use Illuminate\Http\Request;

class SitioController extends Controller
{
    public function getNoticia($titulo){
        $item = Noticia::where('titulo',$titulo)->select('id','titulo','resumen','contenido','imagen')->first();
        $tipoItem = 'noticia';
        $partes = explode('.', $item->imagen);
        $imagen = storage_path("app/$partes[0]").'_300.'.$partes[1];
        return view('interior',compact('item','tipoItem','imagen'));
    }

    public function getArticulo($titulo){
        $item = Articulo::where('titulo',$titulo)->select('id','titulo','resumen','contenido','imagen')->first();
        $tipoItem = 'articulo';
        $partes = explode('.', $item->imagen);
        $imagen = storage_path("app/$partes[0]").'_300.'.$partes[1];
        return view('interior',compact('item','tipoItem','imagen'));
    }
}
