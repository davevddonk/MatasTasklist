<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employees', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firstname', 100);
			$table->string('lastname', 200);
			$table->string('email', 200)->unique();
			$table->string('password', 60);
			$table->string('admin', 20);
			$table->timestamp('deleted_at');
			$table->timestamps();
			$table->rememberToken();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('employees');
	}

}