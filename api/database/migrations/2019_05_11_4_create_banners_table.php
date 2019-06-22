<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{

    public function up()
    {
        Schema::create('Banners', function(Blueprint $table) {
            $table->increments('id');
            $table->string('imagen',70);
            $table->string('empresa',200);
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->integer('posicion');
            $table->boolean('estatus')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('Banners');
    }
}
