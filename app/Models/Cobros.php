<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cobros extends Model
{
    
	public $table = "cobros";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "id_contrato",
		"id_usuario",
		"fecha_pago",
		"cuotas_a_pagar",
		"cuotas_pagadas",
		"no_recibo",
		"no_aviso",
		"estado"
	];

	public static $rules = [
	    "id_contrato" => "required",
		"id_usuario" => "required",
		"fecha_pago" => "required",
		"cuotas_pagadas" => "required",
		"no_recibo"=> "required_without_all:no_aviso",
		"no_aviso"=> "required_without_all:no_recibo"
	];
	
	// public function getDates()
	// {
	//     return ['created_at'];
	// }
	
	public function contrato(){
		return $this->belongsTo('App\Models\Contratos', 'id_contrato');
	}
	
}
