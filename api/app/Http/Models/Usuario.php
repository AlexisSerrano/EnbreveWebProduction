<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model {
    use SoftDeletes;
    protected $table='usuarios';
    
    protected $fillable = [
        'id', 
        'nombre',
        'foto',
        'usuario',
        'password',
        'roll'
    ];

    public $timestamps = true;
}
