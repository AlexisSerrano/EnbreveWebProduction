<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoresTable extends Migration
{

    public function up()
    {
        Schema::create('autores', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',30);
            $table->string('primer_ap',20);
            $table->string('segundo_ap',20)->nullable();
            $table->string('foto',70);
            $table->text('descripcion');
            $table->string('facebook',100)->nullable();
            $table->string('instagram',100)->nullable();
            $table->string('twitter',100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('autores');
    }
}
