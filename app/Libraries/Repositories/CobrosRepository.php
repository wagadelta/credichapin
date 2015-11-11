<?php

namespace App\Libraries\Repositories;


use App\Models\Cobros;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CobrosRepository
{

	/**
	 * Returns all Cobros
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Cobros::all();
	}

	public function search($input)
    {
        $query = Cobros::query();

        $columns = Schema::getColumnListing('cobros');
        $attributes = array();

        foreach($columns as $attribute){
            if(isset($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
                $attributes[$attribute] =  $input[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        return [$query->get(), $attributes];

    }

	/**
	 * Stores Cobros into database
	 *
	 * @param array $input
	 *
	 * @return Cobros
	 */
	public function store($input)
	{
		return Cobros::create($input);
	}

	/**
	 * Find Cobros by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Cobros
	 */
	public function findCobrosById($id)
	{
		return Cobros::find($id);
	}

	/**
	 * Updates Cobros into database
	 *
	 * @param Cobros $cobros
	 * @param array $input
	 *
	 * @return Cobros
	 */
	public function update($cobros, $input)
	{
		$cobros->fill($input);
		$cobros->save();

		return $cobros;
	}
	
	public function findCobrosByFechaCobro($fecha = null){
		$query = Cobros::query();
		$fecha = (is_null($fecha))?Carbon::today()->toDateString() : Carbon::createFromFormat('Y-m-d',$fecha)->toDateString();
		$query->whereDate('fecha_pago', '=', $fecha);
		//dd($query->get());
		return $query->get();
	}
}