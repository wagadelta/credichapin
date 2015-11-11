<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contratos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->float('monto');
			$table->integer('no_cuotas');
			$table->float('valor_cuota');
			$table->string('periodo_cobro');
			$table->integer('solicitado_por');
			$table->dateTime('solicitado_en');
			$table->integer('aprobado_por');
			$table->dateTime('aprobado_en');
			$table->integer('entrado_por');
			$table->dateTime('entregado_en');
			$table->string('entregado_gps');
			$table->dateTime('pagado_en');
			$table->integer('juridico_por');
			$table->dateTime('juridico_en');
			$table->integer('incobrable_por');
			$table->dateTime('incobrable_en');
			$table->integer('rechazado_por');
			$table->dateTime('rechazado_en');
			// DATOS DE PERSONA ASOCIADA A ESTE CONTRATO
			$table->string('nombres');
			$table->string('apellidos');
			$table->string('identificacion');
			$table->string('otra_identificacion');
			$table->dateTime('fecha_nacimiento');
			$table->string('domicilio');
			$table->string('telefonos');
			$table->string('foto');
			$table->string('foto_dpi');
			$table->string('conyugue_nombre');
			$table->string('conyugue_lugar_trabajo');
			$table->string('conyugue_telefono');
			// DATOS DE PERSONA
			$table->enum('estado', array('aprobado', 'entregado', 'juridico', 'rechazado', 'solicitado'));
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contratos');
	}

}
