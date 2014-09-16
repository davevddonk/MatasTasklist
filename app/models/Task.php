<?php

	use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Task extends Eloquent{

	use SoftDeletingTrait;

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at', 'completed_at'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'description', 'category_id', 'employee_id'];

	/**
	 * The validation rules for a task
	 *
	 * @var array
	 */
	public static $taskRules = [
		'title' => 'required',
		'description' => 'required',
		'category_id' => 'required',
		'employee_id' => 'required'
	];

	/**
	 * Error messages from validation
	 *
	 * @var  array
	 */
	public static $errors;

	/**
	 * Check if a task is valid
	 *
	 * @param   array  $data
	 * @return  bool
	 */
	public static function taskIsValid($data)
	{
		$validation = Validator::make($data, static::$taskRules);

		if($validation->passes()) return true;

		static::$errors = $validation->messages();
		return false;
	}
}


