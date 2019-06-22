<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeccionesTable extends Migration
{

    public function up()
    {
        Schema::create('Secciones', function(Blueprint $table) {
            $table->increments('id');
            $table->string('titulo',50);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('Secciones');
    }
}
