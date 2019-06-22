<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cartel extends Model
{
    use SoftDeletes;
    protected $table='carteles';
    
    protected $fillable = [
        'id', 
        'imagen', 
        'fecha_fin'
    ];

    public $timestamps = true;
}
