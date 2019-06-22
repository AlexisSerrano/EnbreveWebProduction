<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{

    public function up()
    {
        Schema::create('Articulos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('titulo',100);
            $table->text('resumen');
            $table->text('contenido');
            $table->string('imagen',70);
            $table->integer('autor')->unsigned(); 
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('autor')->references('id')->on('autores')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::drop('Articulos');
    }
}
