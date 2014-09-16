<?php

class EmployeesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('employees')->truncate();

		Employee::create([
			'firstname' => 'Guido',
			'lastname' => 'Bergman',
			'email' => 'guido@matas.nl',
			'password' => Hash::make('secret'),
			'admin' => 'true'
		]);

		Employee::create([
			'firstname' => 'Rob',
			'lastname' => 'Gloudemans',
			'email' => 'rob@matas.nl',
			'password' => Hash::make('secret'),
			'admin' => 'false'
		]);

		Employee::create([
			'firstname' => 'Peter',
			'lastname' => 'Klaassen',
			'email' => 'peter@matas.nl',
			'password' => Hash::make('secret'),
			'admin' => 'false'
		]);

		Employee::create([
			'firstname' => 'Dave',
			'lastname' => 'van der Donk',
			'email' => 'dave@matas.nl',
			'password' => Hash::make('secret'),
			'admin' => 'false'
		]);
	}
}