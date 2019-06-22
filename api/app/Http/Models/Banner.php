<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model {
    use SoftDeletes;
    protected $table='banners';
    
    protected $fillable = [
        'id', 
        'imagen',
        'empresa', 
        'fecha_inicio',
        'fecha_fin',
        'posicion',
        'estatus'
    ];

    public $timestamps = true;

}
