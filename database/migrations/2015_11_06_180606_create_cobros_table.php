<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCobrosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cobros', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_contrato')->unsigned();
			$table->integer('id_usuario')->unsigned();
			$table->datetime('fecha_pago');
			$table->float('cuotas_a_pagar');
			$table->float('cuotas_pagadas');
			$table->integer('no_recibo');
			$table->integer('no_aviso');
			$table->string('estado');
			$table->foreign('id_contrato')->references('id')->on('contratos')->onDelete('cascade');
			$table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
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
		Schema::drop('cobros');
	}

}
