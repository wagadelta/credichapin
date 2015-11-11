<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Contratos;
use Illuminate\Http\Request;
use App\Libraries\Repositories\ContratosRepository;
use Response;
use Schema;

class ContratosAPIController extends AppBaseController
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

		return Response::json(ResponseManager::makeResult($contratos->toArray(), "Contratos retrieved successfully."));
	}

	public function search($input)
    {
        $query = Contratos::query();

        $columns = Schema::getColumnListing('$TABLE_NAME$');
        $attributes = array();

        foreach($columns as $attribute)
        {
            if(isset($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
            }
        }

        return $query->get();
    }

	/**
	 * Show the form for creating a new Contratos.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Contratos in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Contratos::$rules) > 0)
            $this->validateRequest($request, Contratos::$rules);

        $input = $request->all();

		$contratos = $this->contratosRepository->store($input);

		return Response::json(ResponseManager::makeResult($contratos->toArray(), "Contratos saved successfully."));
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
			$this->throwRecordNotFoundException("Contratos not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($contratos->toArray(), "Contratos retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Contratos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Contratos in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$contratos = $this->contratosRepository->findContratosById($id);

		if(empty($contratos))
			$this->throwRecordNotFoundException("Contratos not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$contratos = $this->contratosRepository->update($contratos, $input);

		return Response::json(ResponseManager::makeResult($contratos->toArray(), "Contratos updated successfully."));
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
			$this->throwRecordNotFoundException("Contratos not found", ERROR_CODE_RECORD_NOT_FOUND);

		$contratos->delete();

		return Response::json(ResponseManager::makeResult($id, "Contratos deleted successfully."));
	}
	
	public function estado($estado, Request $request)
	{

		//$contratos= \DB::table('contratos')->where('estado','=', $estado);
		$query = Contratos::query();
		$query->where('estado', '=', $estado);
		$contratos = $query->get();
		return Response::json(ResponseManager::makeResult($contratos->toArray(), "Contratos updated successfully."));
	}
	
}
