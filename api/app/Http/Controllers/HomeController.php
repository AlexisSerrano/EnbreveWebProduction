<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Models\Articulo;
use App\Http\Models\Autor;
use App\Http\Models\Banner;
use App\Http\Models\Multimedia;
use App\Http\Models\Noticia;
use App\Http\Models\Seccion;
use App\Http\Models\Cartel;
use DB;

class HomeController extends Controller
{
    public function getItemsHome(Request $request){
        $data = array(
            'banners' => $this->getBannersHome($request),
            'seccion' => $this->getNoticiasSeccion($request),
            'articulos' => $this->getArticulos($request),
            'carteles' => $this->getCarteles($request)
        );
        return response()->json($data);
    }

    public function getBannersHome(Request $request){
        $banners = Banner::whereIn('posicion', $request->arregloBanners)->where('estatus',1)->orderBy('posicion', 'asc')->get();
        return $banners;
    }

    public function getNoticiasSeccion(Request $request){
        $secciones = $request->secciones;
        $respuesta = [];
        foreach ($secciones as $seccion) {
            $noticias = Noticia::where('seccion',$seccion['seccion'])->orderBy('id', 'desc')->take($seccion['cantidadNotas'])->get();
            array_push($respuesta, $noticias);
        }
        return $respuesta;
    }

    public function getArticulos(Request $request){
        $articulos = Articulo::orderBy('id', 'desc')->take($request->cantidadArticulos)->get();
        return $articulos;
    }

    public function getAllNoticiasSeccion(Request $request){
        $pagina = $request->pagina-1;
        $cantidad = 20;
        $offset = $pagina*$cantidad;
        $seccion = $request->seccion;
        $noticias = Noticia::where('seccion',$seccion)->orderBy('id', 'desc')->offset($offset)->limit($cantidad)->get();
        return $noticias;
    }

    public function getAllArticulos(Request $request){
        $pagina = $request->pagina-1;
        $cantidad = 20;
        $offset = $pagina*$cantidad;
        $articulos = Articulo::orderBy('id', 'desc')->offset($offset)->limit($cantidad)->get();
        return $articulos;
    }

    public function getBusqueda(Request $request){
        $pagina = $request->pagina-1;
        $cantidad = 20;
        $offset = $pagina*$cantidad;
        $busqueda = $request->busqueda;
        $noticias = Noticia::search($busqueda)->offset($offset)->limit($cantidad)->get();
        return $noticias;
    }

    public function getCarteles(Request $request){
        $carteles = Cartel::where('fecha_fin', '>', Carbon::now()->format('Y-m-d'))->orderBy('id', 'desc')->take($request->cantidadCarteles)->get();
        return $carteles;
    }

    public function getNoticia(Request $request){
        $noticia = Noticia::select('titulo','resumen','contenido','imagen','created_at')->where('id',$request->id)->first();
        $relacionadas = Noticia::orderBy('id', 'desc')->take(4)->get();
        $multimedia = Multimedia::select('url','tipo')->where('noticia',$request->id)->get();
        $fotos = $multimedia->filter(function ($value, $key) {
            return $value->tipo=='foto';
        });
        $video = $multimedia->first(function ($value, $key) {
            return $value->tipo=='video';
        });
        $multimedia = array(
            'fotos'=>$fotos,
            'video'=>$video
        );
        $noticias = array(
            'noticia'=>$noticia,
            'relacionadas'=>$relacionadas,
            'multimedia'=>$multimedia
        );
        return $noticias;
    }

    public function getCartel(Request $request){
        $cartel = Cartel::select('titulo','imagen','fecha_fin')->where('id',$request->id)->where('fecha_fin','<',Carbon::now()->format('Y-m-d'))->first();
        return $cartel;
    }

    public function getArticulo(Request $request){
        $articulo = DB::table('articulos')
			->join('autores','articulos.autor','=','autores.id')
            ->select('articulos.imagen','articulos.titulo','articulos.resumen','articulos.contenido','articulos.created_at',
            'autores.nombre','autores.primer_ap','autores.segundo_ap','autores.foto','autores.descripcion','autores.facebook','autores.instagram','autores.twitter')->where('articulos.id',$request->id)->first();
        $relacionadas = Articulo::orderBy('id', 'desc')->take(4)->get();
        $articulos = array(
            'articulo'=>$articulo,
            'relacionadas'=>$relacionadas
        );
        return $articulos;
    }
}
