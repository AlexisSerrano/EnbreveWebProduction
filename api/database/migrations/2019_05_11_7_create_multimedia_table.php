<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultimediaTable extends Migration
{

    public function up()
    {
        Schema::create('multimedia', function(Blueprint $table) {
            $table->increments('id');
            $table->string('url',100);
            $table->string('tipo',100);
            $table->integer('noticia')->unsigned(); 
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('noticia')->references('id')->on('noticias')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::drop('multimedia');
    }
}
