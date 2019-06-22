<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Http\Models\Autor',3)->create();
        $this->call(Pruebas::class);
        factory('App\Http\Models\Articulo','1',10)->create();
        factory('App\Http\Models\Articulo','2',10)->create();
        factory('App\Http\Models\Articulo','3',10)->create();
        factory('App\Http\Models\Noticia','1',100)->create();
        factory('App\Http\Models\Noticia','2',100)->create();
        // factory('App\Http\Models\Multimedia',15)->create();
    }
}
