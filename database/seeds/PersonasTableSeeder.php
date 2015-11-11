<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;


class PersonasTableSeeder extends Seeder {

public function run()
 {
    $faker = Faker::create('es_ES');

    foreach(range(1,1000) as $index)
    {
        DB::table('personas')->insert([
          'nombres' => $faker->firstNameMale ,
          'apellidos' => $faker->lastName ,
          'identificacion' => $faker->isbn13 ,
          'otra_identificacion' =>  $faker->isbn10 ,
          'fecha_nacimiento' =>  $faker->dateTimeBetween($startDate = '-50 years', $endDate = 'now') ,
          'domicilio' =>  $faker->address,
          'telefonos' =>  $faker->phoneNumber,
          'foto' =>  'path',
          'foto_dpi' =>  'path',
          'conyugue_nombre' =>  $faker->firstNameFemale.' '. $faker->lastName,
          'conyugue_lugar_trabajo' => $faker->address ,
          'conyugue_telefono' => $faker->phoneNumber ,
          'id_contrato' =>    $faker->numberBetween($min = 1, $max = 500)  ,
          'estado' => $faker->randomElement($array = array ('activo','cancelado','suspendido'))
        ]);
    } //foreach
 }//function
}//class
