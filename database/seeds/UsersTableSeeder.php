<?php
 
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder {
public function run()
 {
  $user = [
     [
      'id_supervisor' => 0,
      'identificacion' => '2757704190101',
    		'otra_identificacion' => '',
    		'email' => 'supervisor@gmail.com',
    		'nombres' => 'admin wilver',
    		'apellidos' => 'arreaga',
    		'telefonos' => '',
    		'foto' => '',
    		'correlativo_recibo_cobro' => '',
    		'correlativo_recibo_entrega' => '',
    		'usuario' => 'admin-WAGA',
    		'password' => Hash::make('super15'),
    		'id_rol' => 1,  //administrador
	    ],
	    [
      'id_supervisor' => 0,
      'identificacion' => '2546091390203',
    		'otra_identificacion' => '',
    		'email' => 'axelsarceno.delta@gmail.com',
    		'nombres' => 'Axel',
    		'apellidos' => 'Sarceño',
    		'telefonos' => '41155679',
    		'foto' => '',
    		'correlativo_recibo_cobro' => '',
    		'correlativo_recibo_entrega' => '',
    		'usuario' => 'admin-axel',
    		'password' => Hash::make('123456'),
    		'id_rol' => 1,  //administrador
	    ],
	    [
      'id_supervisor' => 2,
      'identificacion' => '4654656',
    		'otra_identificacion' => '',
    		'email' => 'fabio@gmail.com',
    		'nombres' => 'fabio',
    		'apellidos' => 'gonzalez fuentes',
    		'telefonos' => '32155985',
    		'foto' => '',
    		'correlativo_recibo_cobro' => '6',
    		'correlativo_recibo_entrega' => '6',
    		'usuario' => 'fabio',
    		'password' => Hash::make('fabiopass'),
    		'id_rol' => 3,  //cobrador
	    ],
	    	    [
      'id_supervisor' => 0,
      'identificacion' => '2757704190101',
    		'otra_identificacion' => '',
    		'email' => 'wagagt@gmail.com',
    		'nombres' => 'super waga',
    		'apellidos' => 'gonzalez arreaga',
    		'telefonos' => '30368985',
    		'foto' => '',
    		'correlativo_recibo_cobro' => '1',
    		'correlativo_recibo_entrega' => '1',
    		'usuario' => 'superwaga',
    		'password' => Hash::make('waga15'),
    		'id_rol' => 2,  //supervisor
	    ],
	    [
      'id_supervisor' => 4,
      'identificacion' => '4654656',
    		'otra_identificacion' => '',
    		'email' => 'diego@gmail.com',
    		'nombres' => 'diego',
    		'apellidos' => 'gonzalez fuentes',
    		'telefonos' => '32155985',
    		'foto' => '',
    		'correlativo_recibo_cobro' => '7',
    		'correlativo_recibo_entrega' => '7',
    		'usuario' => 'diego',
    		'password' => Hash::make('diegopass'),
    		'id_rol' => 3,  //supervisor
	    ]
	    
	 ];
 
    DB::table('users')->insert($user);
 }
 
}