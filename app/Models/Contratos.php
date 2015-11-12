<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contratos extends Model
{
    
	public $table = "contratos";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "monto",
		"no_cuotas",
		"valor_cuota",
		"periodo_cobro",
		"solicitado_por",
		"solicitado_en",
		"aprobado_por",
		"aprobado_en",
		"entrado_por",
		"entregado_en",
		"entregado_gps",
		"pagado_en",
		"juridico_por",
		"juridico_en",
		"incobrable_por",
		"incobrable_en",
		"rechazado_por",
		"rechazado_en",
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
		"estado"
	];

	public static $rules = [
	    "monto" => "required",
		"no_cuotas" => "required",
		"periodo_cobro" => "required",
		"solicitado_por" =>"required",
		"solicitado_en" =>"required",
		"nombres" =>"required",
		"apellidos" =>"required",
		"identificacion" =>"required",
		"fecha_nacimiento" =>"required",
		"domicilio" =>"required",
		"telefonos" =>"required"
	];
	
	public function user(){
		return $this->belongsTo('App\Models\Users', 'solicitado_por');
	}
	
	public function cobros(){
		return $this->hasMany('App\Models\Cobros');
	}
	
	public function referencias(){
		return $this->belongsTo('App\Models\Personas', 'id_contrato');
	}

}
