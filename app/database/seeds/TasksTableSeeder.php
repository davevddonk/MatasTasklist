<?php
// Composer: "fzaninotto/faker": "v1.3.0"

use Faker\Factory as Faker;

class TasksTableSeeder extends Seeder {

	public function run()
	{
		Task::truncate();
		$faker = Faker::create();

		foreach(range(1, 100) as $index)
		{
			$numb = array(1, 2, 3, 4);
			$numbs = array(1, 2);
			$nums = $numbs[array_rand($numbs)];
			$num = $numb[array_rand($numb)];
			Task::create([
				'title' => $faker->sentence,
				'description' => $faker->paragraph(3),
				'category_id' => $nums,
				'employee_id' => $num,
				'complaint' => 'No complaints so far.'
			]);
		}
	}
	// public function run()
	// {
	// 	Task::create([
	// 		'title'=> 'Create a website',
	// 		'description'=> 'We are going to create a website for .....',
	// 		'category_id'=> '1',
	// 		'employee_id'=> '1'
	// 	]);
	// 	Task::create([
	// 		'title'=> 'Create a shortcut for the website',
	// 		'description'=> 'We are going to create a shortcut from the home page to the login page.',
	// 		'category_id'=> '2',
	// 		'employee_id'=> '1'
	// }
}