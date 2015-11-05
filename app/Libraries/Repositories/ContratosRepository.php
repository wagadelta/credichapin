<?php

namespace App\Libraries\Repositories;


use App\Models\Contratos;
use Illuminate\Support\Facades\Schema;

class ContratosRepository
{

	/**
	 * Returns all Contratos
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Contratos::all();
	}

	public function search($input)
    {
        $query = Contratos::query();

        $columns = Schema::getColumnListing('contratos');
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
	 * Stores Contratos into database
	 *
	 * @param array $input
	 *
	 * @return Contratos
	 */
	public function store($input)
	{
		return Contratos::create($input);
	}

	/**
	 * Find Contratos by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Contratos
	 */
	public function findContratosById($id)
	{
		return Contratos::find($id);
	}

	/**
	 * Updates Contratos into database
	 *
	 * @param Contratos $contratos
	 * @param array $input
	 *
	 * @return Contratos
	 */
	public function update($contratos, $input)
	{
		$contratos->fill($input);
		$contratos->save();

		return $contratos;
	}
	

}