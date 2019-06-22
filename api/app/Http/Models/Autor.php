<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autor extends Model {
    use SoftDeletes;
    protected $table='autores';
    
    protected $fillable = [
        'id', 
        'nombre', 
        'primer_ap',
        'segundo_ap',
        'foto',
        'descripcion',
        'facebook',
        'instagram',
        'twitter'
    ];

    public $timestamps = true;

}
