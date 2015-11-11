<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    
	public $table = "personas";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "nombres",
		"apellidos",
		"identificacion",
		"otra_identificacion",
		"fecha_nacimiento",
		"domicilio",
		"telefonos",
		"foto",
		"foto_dpi",
		"conyugue_nombre",
		"conyugue_lugar_trabajo",
		"conyugue_telefono",
		"id_contrato",
		"estado"
	];

	public static $rules = [
	    "nombres" => "required",
	    "apellidos" => "required",
		"identificacion" => "required",
		"otra_identificacion" => "required",
		"fecha_nacimiento" => "required",
		"id_contrato" => "required"
	];

	public function contrato(){
		return $this->belongsTo('\App\Model\Contratos');
	}
}
