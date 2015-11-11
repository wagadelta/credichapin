<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;


class ContratosTableSeeder extends Seeder {

public function run()
 {
    $faker = Faker::create('es_ES');

    foreach(range(1,500) as $index)
    {
      $monto        = $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 50000);
      $no_cuotas    = $faker->randomElement($array = array (3,6,10,12,24,48));
      $valor_cuota  = $monto/$no_cuotas;
      $contrato =
      [
          'monto' =>   $monto,
          'no_cuotas' => $no_cuotas,
          'valor_cuota' =>  $valor_cuota ,
          'periodo_cobro' =>  $faker->randomElement($array = array ('diario', 'semanal', 'quincenal', 'mensual')),
          'solicitado_por' =>  $faker->numberBetween($min = 2, $max = 5)  ,
          'solicitado_en' =>   $faker->dateTimeThisYear($max='now'),
          'aprobado_por' =>    $faker->numberBetween($min = 2, $max = 5)  ,
          'aprobado_en' =>    $faker->dateTimeThisYear($max='now'),
          'entrado_por' =>    $faker->numberBetween($min = 2, $max = 5)  ,
          'entregado_en' =>   $faker->dateTimeThisYear($max='now'),
          'entregado_gps' =>  $faker->latitude.", ".$faker->longitude  ,
          'pagado_en' =>     $faker->dateTimeThisYear($max='now'),
          'juridico_por' =>    $faker->numberBetween($min = 2, $max = 5)  ,
          'juridico_en' =>   $faker->dateTimeThisYear($max='now'),
          'incobrable_por' => $faker->numberBetween($min = 2, $max = 5)  ,
          'incobrable_en' =>  $faker->dateTimeThisYear($max='now'),
          'rechazado_por' =>  $faker->numberBetween($min = 2, $max = 5)  ,
          'rechazado_en' =>   $faker->dateTimeThisYear($max='now'),
          // DATOS DE PERSONA ASOCIADA A ESTE CONTRATO
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
          // DATOS DE PERSONA
          'estado' => $faker->randomElement($array = array('solicitado', 'aprobado', 'rechazado', 'entregado', 'pagado', 'juridico' ))
      ];
      DB::table('contratos')->insert($contrato);
    } //foreach
 }//function
}//class
