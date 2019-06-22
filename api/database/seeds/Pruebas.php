<?php

use Illuminate\Database\Seeder;

class Pruebas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            [ 'id' => 1,
            'nombre' => 'cesar giovanni serrano carrion',
            'foto' => 'recursos/usuario.png',
            'usuario' => 'cesar',
            'password' => 'e5e3f5988a51e2fe7308986ca8819fef0a9007b4',
            'salt' => 'ycaOoGfB9T8MgxXEDSqA',
            'roll' => 'admin']
        ]);

        DB::table('secciones')->insert([
            [ 'id' => 1,
            'titulo' => 'social'],
            [ 'id' => 2,
            'titulo' => 'cultural']
        ]);

        DB::table('banners')->insert([
            [ 'id' => 1,
            'imagen' => 'recursos/bannerCentral.jpg',
            'empresa' => 'coca cola',
            'fecha_inicio' => '2019-05-16 16:02:14',
            'fecha_fin' => '2019-05-20 16:02:14',
            'posicion' => '1',
            'estatus' => '1'],
            [ 'id' => 2,
            'imagen' => 'recursos/bannerParcial.jpg',
            'empresa' => 'coca cola',
            'fecha_inicio' => '2019-05-16 16:02:14',
            'fecha_fin' => '2019-05-20 16:02:14',
            'posicion' => '2',
            'estatus' => '1'],
            [ 'id' => 3,
            'imagen' => 'recursos/bannerParcial.jpg',
            'empresa' => 'coca cola',
            'fecha_inicio' => '2019-05-16 16:02:14',
            'fecha_fin' => '2019-05-20 16:02:14',
            'posicion' => '3',
            'estatus' => '1'],
            [ 'id' => 4,
            'imagen' => 'recursos/bannerParcial.jpg',
            'empresa' => 'coca cola',
            'fecha_inicio' => '2019-05-16 16:02:14',
            'fecha_fin' => '2019-05-20 16:02:14',
            'posicion' => '4',
            'estatus' => '1'],
            [ 'id' => 5,
            'imagen' => 'recursos/bannerParcial.jpg',
            'empresa' => 'coca cola',
            'fecha_inicio' => '2019-05-16 16:02:14',
            'fecha_fin' => '2019-05-20 16:02:14',
            'posicion' => '5',
            'estatus' => '1'],
            [ 'id' => 6,
            'imagen' => 'recursos/bannerParcial.jpg',
            'empresa' => 'coca cola',
            'fecha_inicio' => '2019-05-16 16:02:14',
            'fecha_fin' => '2019-05-20 16:02:14',
            'posicion' => '6',
            'estatus' => '1'],
            [ 'id' => 7,
            'imagen' => 'recursos/bannerParcial.jpg',
            'empresa' => 'coca cola',
            'fecha_inicio' => '2019-05-16 16:02:14',
            'fecha_fin' => '2019-05-20 16:02:14',
            'posicion' => '7',
            'estatus' => '1'],
            [ 'id' => 8,
            'imagen' => 'recursos/bannerCentral.jpg',
            'empresa' => 'coca cola',
            'fecha_inicio' => '2019-05-16 16:02:14',
            'fecha_fin' => '2019-05-20 16:02:14',
            'posicion' => '8',
            'estatus' => '1'],
            [ 'id' => 9,
            'imagen' => 'recursos/bannerLateral.jpg',
            'empresa' => 'coca cola',
            'fecha_inicio' => '2019-05-16 16:02:14',
            'fecha_fin' => '2019-05-20 16:02:14',
            'posicion' => '9',
            'estatus' => '1'],
            [ 'id' => 10,
            'imagen' => 'recursos/bannerLateral.jpg',
            'empresa' => 'coca cola',
            'fecha_inicio' => '2019-05-16 16:02:14',
            'fecha_fin' => '2019-05-20 16:02:14',
            'posicion' => '10',
            'estatus' => '1'],
            [ 'id' => 11,
            'imagen' => 'recursos/bannerLateral.jpg',
            'empresa' => 'coca cola',
            'fecha_inicio' => '2019-05-16 16:02:14',
            'fecha_fin' => '2019-05-20 16:02:14',
            'posicion' => '11',
            'estatus' => '1'],
            [ 'id' => 12,
            'imagen' => 'recursos/bannerParcial.jpg',
            'empresa' => 'coca cola',
            'fecha_inicio' => '2019-05-16 16:02:14',
            'fecha_fin' => '2019-05-20 16:02:14',
            'posicion' => '12',
            'estatus' => '1'],
            [ 'id' => 13,
            'imagen' => 'recursos/bannerParcial.jpg',
            'empresa' => 'coca cola',
            'fecha_inicio' => '2019-05-16 16:02:14',
            'fecha_fin' => '2019-05-20 16:02:14',
            'posicion' => '13',
            'estatus' => '1'],
            [ 'id' => 14,
            'imagen' => 'recursos/bannerLateral.jpg',
            'empresa' => 'coca cola',
            'fecha_inicio' => '2019-05-16 16:02:14',
            'fecha_fin' => '2019-05-20 16:02:14',
            'posicion' => '14',
            'estatus' => '1'],
            [ 'id' => 15,
            'imagen' => 'recursos/bannerCentral.jpg',
            'empresa' => 'coca cola',
            'fecha_inicio' => '2019-05-16 16:02:14',
            'fecha_fin' => '2019-05-20 16:02:14',
            'posicion' => '15',
            'estatus' => '1'],
            [ 'id' => 16,
            'imagen' => 'recursos/bannerLateral.jpg',
            'empresa' => 'coca cola',
            'fecha_inicio' => '2019-05-16 16:02:14',
            'fecha_fin' => '2019-05-20 16:02:14',
            'posicion' => '16',
            'estatus' => '1'],
            [ 'id' => 17,
            'imagen' => 'recursos/bannerLateral.jpg',
            'empresa' => 'coca cola',
            'fecha_inicio' => '2019-05-16 16:02:14',
            'fecha_fin' => '2019-05-20 16:02:14',
            'posicion' => '17',
            'estatus' => '1'],
            [ 'id' => 18,
            'imagen' => 'recursos/bannerLateral.jpg',
            'empresa' => 'coca cola',
            'fecha_inicio' => '2019-05-16 16:02:14',
            'fecha_fin' => '2019-05-20 16:02:14',
            'posicion' => '18',
            'estatus' => '1'],
            [ 'id' => 19,
            'imagen' => 'recursos/bannerParcial.jpg',
            'empresa' => 'coca cola',
            'fecha_inicio' => '2019-05-16 16:02:14',
            'fecha_fin' => '2019-05-20 16:02:14',
            'posicion' => '19',
            'estatus' => '1'],
            [ 'id' => 20,
            'imagen' => 'recursos/bannerParcial.jpg',
            'empresa' => 'coca cola',
            'fecha_inicio' => '2019-05-16 16:02:14',
            'fecha_fin' => '2019-05-20 16:02:14',
            'posicion' => '20',
            'estatus' => '1'],
        ]);

        DB::table('carteles')->insert([
            [ 'id' => 1,
            'imagen' => 'recursos/cartel.png',
            'titulo' => "Cartel 1",
            'fecha_fin' => '2019-06-30 16:02:14',],
            [ 'id' => 2,
            'imagen' => 'recursos/cartel.png',
            'titulo' => "Cartel 2",
            'fecha_fin' => '2019-06-30 16:02:14',],
            [ 'id' => 3,
            'imagen' => 'recursos/cartel.png',
            'titulo' => "Cartel 3",
            'fecha_fin' => '2019-06-30 16:02:14',],
            [ 'id' => 4,
            'imagen' => 'recursos/cartel.png',
            'titulo' => "Cartel 4",
            'fecha_fin' => '2019-06-30 16:02:14',]
        ]);
    }
}
