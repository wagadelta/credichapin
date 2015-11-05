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
		"periodo_cobro" => "required"
	];

}
