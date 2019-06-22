<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Multimedia extends Model {
    use SoftDeletes;
    protected $table='multimedia';
    
    protected $fillable = [
        'id', 
        'url', 
        'tipo',
        'noticia'
    ];

    public $timestamps = true;

}
