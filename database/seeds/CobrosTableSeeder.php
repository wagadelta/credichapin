<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;


class CobrosTableSeeder extends Seeder {

public function run()
 {
    $faker = Faker::create('es_ES');

    foreach(range(1,500) as $index)
    {
      $cobro =
      [
      'id_contrato'     => $faker->numberBetween($min = 1, $max = 500)  ,
      'id_usuario'      => $faker->numberBetween($min = 2, $max = 5)  ,
      'fecha_pago'      => $faker->dateTimeThisMonth($max = 'now'),
      'cuotas_a_pagar'  => $faker->numberBetween($min = 1, $max = 5)  ,
      'cuotas_pagadas'  => $faker->numberBetween($min = 1, $max = 5)  ,
      'no_recibo'       => 'R-'.$faker->numberBetween($min = 5000, $max = 55000)  ,
      'no_aviso'        => 'A-'.$faker->numberBetween($min = 5000, $max = 55000)  ,
      'estado'        => '1'
      ];
      DB::table('cobros')->insert($cobro);
    } //foreach
 }//function
}//class
