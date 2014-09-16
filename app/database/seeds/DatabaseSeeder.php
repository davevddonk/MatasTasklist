<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('EmployeesTableSeeder');
		$this->call('TasksTableSeeder');
		$this->call('CategoriesTableSeeder');
	}

}
