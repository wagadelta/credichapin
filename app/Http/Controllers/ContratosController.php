<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateContratosRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\ContratosRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class ContratosController extends AppBaseController
{

	/** @var  ContratosRepository */
	private $contratosRepository;

	function __construct(ContratosRepository $contratosRepo)
	{
		$this->contratosRepository = $contratosRepo;
	}

	/**
	 * Display a listing of the Contratos.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->contratosRepository->search($input);

		$contratos = $result[0];

		$attributes = $result[1];

		return view('contratos.index')
		    ->with('contratos', $contratos)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Contratos.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('contratos.create');
	}

	/**
	 * Store a newly created Contratos in storage.
	 *
	 * @param CreateContratosRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateContratosRequest $request)
	{
        $input = $request->all();

		$contratos = $this->contratosRepository->store($input);

		Flash::message('Contratos saved successfully.');

		return redirect(route('contratos.index'));
	}

	/**
	 * Display the specified Contratos.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$contratos = $this->contratosRepository->findContratosById($id);

		if(empty($contratos))
		{
			Flash::error('Contratos not found');
			return redirect(route('contratos.index'));
		}

		return view('contratos.show')->with('contratos', $contratos);
	}

	/**
	 * Show the form for editing the specified Contratos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$contratos = $this->contratosRepository->findContratosById($id);

		if(empty($contratos))
		{
			Flash::error('Contratos not found');
			return redirect(route('contratos.index'));
		}

		return view('contratos.edit')->with('contratos', $contratos);
	}

	/**
	 * Update the specified Contratos in storage.
	 *
	 * @param  int    $id
	 * @param CreateContratosRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateContratosRequest $request)
	{
		$contratos = $this->contratosRepository->findContratosById($id);

		if(empty($contratos))
		{
			Flash::error('Contratos not found');
			return redirect(route('contratos.index'));
		}

		$contratos = $this->contratosRepository->update($contratos, $request->all());

		Flash::message('Contratos updated successfully.');

		return redirect(route('contratos.index'));
	}

	/**
	 * Remove the specified Contratos from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$contratos = $this->contratosRepository->findContratosById($id);

		if(empty($contratos))
		{
			Flash::error('Contratos not found');
			return redirect(route('contratos.index'));
		}

		$contratos->delete();

		Flash::message('Contratos deleted successfully.');

		return redirect(route('contratos.index'));
	}

}
