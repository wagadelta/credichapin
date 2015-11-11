<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombres');
			$table->string('apellidos');
			$table->string('identificacion');
			$table->string('otra_identificacion');
			$table->string('fecha_nacimiento');
			$table->string('domicilio');
			$table->string('telefonos');
			$table->string('foto');
			$table->string('foto_dpi');
			$table->string('conyugue_nombre');
			$table->string('conyugue_lugar_trabajo');
			$table->string('conyugue_telefono');
			$table->integer('id_contrato')->unsigned();
			$table->foreign('id_contrato')->references('id')->on('contratos')->onDelete('cascade');
			$table->string('estado');
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
		Schema::drop('personas');
	}

}
