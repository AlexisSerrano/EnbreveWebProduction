<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo extends Model {
    use SoftDeletes;
    protected $table='articulos';
    
    protected $fillable = [
        'id', 
        'titulo', 
        'resumen',
        'contenido',
        'imagen',
        'autor'
    ];

    public $timestamps = true;

}
