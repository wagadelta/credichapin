<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Cobros;
use Illuminate\Http\Request;
use App\Libraries\Repositories\CobrosRepository;
use App\Libraries\Repositories\ContratosRepository;
use Response;
use Schema;

class CobrosAPIController extends AppBaseController
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
	  $input = $request->all();

		//$result = $this->cobrosRepository->search($input);
		$result = $this->cobrosRepository->cobrosToday;

	  	$cobros = $result[0];

		return Response::json(ResponseManager::makeResult($cobros->toArray(), "Cobros retrieved successfully."));
	}

	public function search($input)
    {
        $query = Cobros::query();

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
	 * Show the form for creating a new Cobros.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Cobros in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Cobros::$rules) > 0)
            $this->validateRequest($request, Cobros::$rules);

        $input = $request->all();

		$cobros = $this->cobrosRepository->store($input);

		return Response::json(ResponseManager::makeResult($cobros->toArray(), "Cobros saved successfully."));
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
			$this->throwRecordNotFoundException("Cobros not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($cobros->toArray(), "Cobros retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Cobros.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Cobros in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$cobros = $this->cobrosRepository->findCobrosById($id);

		if(empty($cobros))
			$this->throwRecordNotFoundException("Cobros not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$cobros = $this->cobrosRepository->update($cobros, $input);

		return Response::json(ResponseManager::makeResult($cobros->toArray(), "Cobros updated successfully."));
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
			$this->throwRecordNotFoundException("Cobros not found", ERROR_CODE_RECORD_NOT_FOUND);

		$cobros->delete();

		return Response::json(ResponseManager::makeResult($id, "Cobros deleted successfully."));
	}
}
