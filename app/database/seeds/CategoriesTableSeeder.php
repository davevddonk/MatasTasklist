<?php

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		Category::truncate();

		Category::create([
			'name'=>'Hardware',
			'description'=>'The people working with hardware.'
		]);
		Category::create([
			'name'=>'Software',
			'description'=>'The people working with software.'
		]);
	}

}