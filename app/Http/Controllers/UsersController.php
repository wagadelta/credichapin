<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateUsersRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\RolesRepository;
use App\Libraries\Repositories\UsersRepository;
use Mitul\Controller\AppBaseController;
use Carbon\Carbon;
use Response;
use Flash;

class UsersController extends AppBaseController
{

	/** @var  UsersRepository */
	private $UsersRepository;
	private $RolesRepository;
	private $ClientesRepository;

	function __construct(UsersRepository $usersRepo, RolesRepository $rolesRepo)
	{
		$this->usersRepository = $usersRepo;
		$this->rolesRepository = $rolesRepo;
	}

	/**
	 * Display a listing of the users.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->usersRepository->search($input);

		$users = $result[0];
		
		$attributes = $result[1];
		//dd($users);
		return view('users.index')
		    ->with('users', $users)
		    ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Users.
	 *
	 * @return Response
	 */
	public function create()
	{
				
		/*Add selectS options*/
		$roles_options 		= $this->rolesRepository->optionList();
		$supervisor_options = $this->usersRepository->supervisorList();

		return view('users.create')
		->with('rol_options', $roles_options)
		->with('supervisor_options', $supervisor_options);
	}

	/**
	 * Store a newly created Users in storage.
	 *
	 * @param CreateUsersRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateUsersRequest $request)
	{
        $input = $request->all();

		$Users = $this->usersRepository->store($input);

		Flash::message('Users saved successfully.');

		return redirect(route('users.index'));
	}

	/**
	 * Display the specified users.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$Users = $this->usersRepository->findUsersById($id);

		if(empty($Users))
		{
			Flash::error('Users not found');
			return redirect(route('users.index'));
		}

		return view('users.show')->with('Users', $Users);
	}

	/**
	 * Show the form for editing the specified users.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Users = $this->usersRepository->findUsersById($id);
		/*Add selectS options*/
		$roles_options 		= $this->rolesRepository->optionList();
		$supervisor_options = $this->usersRepository->supervisorList();
		//dd($supervisor_options);
		if(empty($Users))
		{
			Flash::error('Users not found');
			return redirect(route('users.index'));
		}

		return view('users.edit')
		->with('userdata', $Users)
		->with('rol_options', $roles_options)
		->with('supervisor_options', $supervisor_options);
	}

	/**
	 * Update the specified Users in storage.
	 *
	 * @param  int    $id
	 * @param CreateUsersRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateUsersRequest $request)
	{
		$Users = $this->usersRepository->findUsersById($id);
		//dd($Users);

		if(empty($Users))
		{
			Flash::error('Users not found');
			return redirect(route('users.index'));
		}
		
		//dd($request->all());
		//dd($request);
		$Users = $this->usersRepository->update($Users, $request->all());

		Flash::message('Users updated successfully.');

		return redirect(route('users.index'));
	}

	/**
	 * Remove the specified Users from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$Users = $this->usersRepository->findUsersById($id);

		if(empty($Users))
		{
			Flash::error('Users not found');
			return redirect(route('users.index'));
		}

		$Users->delete();

		Flash::message('Users deleted successfully.');

		return redirect(route('users.index'));
	}
	
	public function cobros($idUser, $fechaPago = null){

		//\DB::enableQueryLog();
		$fechaPago = (is_null($fechaPago)) ? Carbon::today()->toDateString() : Carbon::createFromFormat('Y-m-d',$fechaPago)->toDateString();

		$dateFrom 	= $fechaPago." 00:00:00" ;
		$dateTo 	= $fechaPago." 23:59:59" ;
		//dd(array($dateFrom,$dateTo));
		
		$cobros = \App\Models\Cobros::where('id_usuario', '=', $idUser)
		//->where('fecha_pago','=',$fechaPago)
		->whereBetween('fecha_pago', array($dateFrom,$dateTo))
		->get();
		// foreach($cobros as $cobro){
		// 	echo "<br>".$cobro->fecha_pago;
		// 	echo "<br>".$cobro->cuotas_a_pagar;
		// 	echo "<br>".$cobro->cuotas_pagadas;
		// 	$cobro->contrato();
		//var_dump($cobros);		dd(\DB::getQueryLog());
		// }
		return view('users.cobros')
		->with('cobros', $cobros)
		->with('fechaPago', $fechaPago);
	}

}

