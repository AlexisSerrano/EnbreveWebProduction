<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasTable extends Migration
{

    public function up()
    {
        Schema::create('noticias', function(Blueprint $table) {
            $table->increments('id');
            $table->string('titulo',100);
            $table->text('resumen');
            $table->text('contenido');
            $table->string('imagen',70);
            $table->integer('usuario')->unsigned(); 
            $table->integer('seccion')->unsigned(); 
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('usuario')->references('id')->on('usuarios')->onDelete('restrict');
            $table->foreign('seccion')->references('id')->on('secciones')->onDelete('restrict');
        });
        DB::statement('ALTER TABLE noticias ADD FULLTEXT fulltext_index (titulo, resumen, contenido)');
    }

    public function down()
    {
        Schema::drop('noticias');
    }
}
