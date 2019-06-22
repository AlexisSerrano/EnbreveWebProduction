<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\FullTextSearch;

class Noticia extends Model {
    use SoftDeletes;
    use FullTextSearch;
    protected $table='noticias';
    
    protected $fillable = [
        'id', 
        'titulo', 
        'resumen',
        'contenido',
        'imagen',
        'usuario',
        'seccion'
    ];

    protected $searchable = [
        'titulo',
        'resumen',
        'contenido'
    ];

    public $timestamps = true;

}
