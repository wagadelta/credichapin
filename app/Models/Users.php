<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    
	public $table = "users";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
		"id_supervisor",
	    "identificacion",
		"otra_identificacion",
		"email",
		"nombres",
		"apellidos",
		"telefonos",
		"foto",
		"correlativo_recibo_cobro",
		"correlativo_recibo_entrega",
		"usuario",
		"password",
		"id_rol"
	];

	public static $rules = [
	    "identificacion" => "required",
		"email" => "required | email ",
		"nombres" => "required",
		"apellidos" => "required",
		"telefonos" => "required",
		"id_rol" => "required",
		"usuario" => "required",
		"password" => "required|min:6|confirmed",
		"password_confirmation" => "required|min:6"
	];
	
	
	/* Relationed Fields*/
	public function rol()
	{
		//dd($this->belongsTo('App\Models\Roles'));
		return $this->belongsTo('App\Models\Roles', 'id_rol');
	}
	
	public function cliente()
	{
		//dd($this->belongsTo('App\Models\Roles'));
		return $this->belongsTo('App\Models\Clientes', 'id_cliente');
	}	
	
	public function supervisorName($idSupervisor)
	{
		//dd($idSupervisor);
		if ($idSupervisor == 0 ){
			return 'NA';
		}else{
			return \DB::table('users')->where('id',$this->id_supervisor)->pluck('usuario');
			
		}
	}

	public function contratos(){
		return $this->hasMany('App\Models\Contratos');
	}
	
	public function cobros(){
		return $this->hasMany('App\Models\Cobros');
	}
}
