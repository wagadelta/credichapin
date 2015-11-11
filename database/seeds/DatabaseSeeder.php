<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('RolesTableSeeder');
		$this->command->info('Roles table seeded!');

		$this->call('UsersTableSeeder');
		$this->command->info('User table seeded!');

		$this->call('ContratosTableSeeder');
		$this->command->info('Contratos table seeded!');
		
		$this->call('PersonasTableSeeder');
		$this->command->info('User table seeded!');

		$this->call('CobrosTableSeeder');
		$this->command->info('Cobros table seeded!');

	}

}
