<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{

    public function up()
    {
        Schema::create('usuarios', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',70);
            $table->string('foto',70);
            $table->string('usuario',40);
            $table->string('password',60);
            $table->string('salt',20);
            $table->string('roll',50);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('usuarios');
    }
}
