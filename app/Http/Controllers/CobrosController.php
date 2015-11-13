<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCobrosRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\CobrosRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Carbon\Carbon;
use Flash;

class CobrosController extends AppBaseController
{

	/** @var  CobrosRepository */
	private $cobrosRepository;

	function __construct(CobrosRepository $cobrosRepo)
	{
		$this->cobrosRepository = $cobrosRepo;
	}

	/**
	 * Display a listing of the Cobros.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	   //$input = $request->all();

		//$result = $this->cobrosRepository->search($input);

		//$cobros = $result[0];
		$cobros = \DB::table('cobros')->orderBy('fecha_pago', 'desc')->paginate(25);

		//$attributes = $result[1];
		$cobros->setPath($request->url());

		return view('cobros.index')
		    ->with('cobros', $cobros);
		    //->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Cobros.
	 *
	 * @return Response
	 **/ 
	public function create()
	{
		return view('cobros.create');
	}

	/**
	 * Store a newly created Cobros in storage.
	 *
	 * @param CreateCobrosRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCobrosRequest $request)
	{
        $input = $request->all();

		$cobros = $this->cobrosRepository->store($input);

		Flash::message('Cobros saved successfully.');

		return redirect(route('cobros.index'));
	}

	/**
	 * Display the specified Cobros.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$cobros = $this->cobrosRepository->findCobrosById($id);

		if(empty($cobros))
		{
			Flash::error('Cobros not found');
			return redirect(route('cobros.index'));
		}

		return view('cobros.show')->with('cobros', $cobros);
	}

	/**
	 * Show the form for editing the specified Cobros.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$cobros = $this->cobrosRepository->findCobrosById($id);

		if(empty($cobros))
		{
			Flash::error('Cobros not found');
			return redirect(route('cobros.index'));
		}

		return view('cobros.edit')->with('cobros', $cobros);
	}

	/**
	 * Update the specified Cobros in storage.
	 *
	 * @param  int    $id
	 * @param CreateCobrosRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateCobrosRequest $request)
	{
		$cobros = $this->cobrosRepository->findCobrosById($id);

		if(empty($cobros))
		{
			Flash::error('Cobros not found');
			return redirect(route('cobros.index'));
		}

		$cobros = $this->cobrosRepository->update($cobros, $request->all());

		Flash::message('Cobros updated successfully.');

		return redirect(route('cobros.index'));
	}

	/**
	 * Remove the specified Cobros from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$cobros = $this->cobrosRepository->findCobrosById($id);

		if(empty($cobros))
		{
			Flash::error('Cobros not found');
			return redirect(route('cobros.index'));
		}

		$cobros->delete();

		Flash::message('Cobros deleted successfully.');

		return redirect(route('cobros.index'));
	}
	
	public function fecha_pago($fecha = null, Request $request){
		
		$cobros = $this->cobrosRepository->findCobrosByFechaCobro($fecha);
		//$cobros->setPath($request->url());
		return view('cobros.indexByDate')
		    ->with('cobros', $cobros)
		    ->with('fecha',$fecha);
	}

}
