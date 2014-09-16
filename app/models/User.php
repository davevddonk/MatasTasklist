<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public static $registerRules = [
		'firstname' => 'required',
		'lastname' => 'required',
		'email' => 'required',
		'password' => 'required'
	];

	public static $loginRules = [
		'email' => 'required',
		'password' => 'required'
	];

	public static $errors;

	public static function registerIsValid($data)
	{
		$validation = Validator::make($data, static::$registerRules);

		if($validation->passes()) return true;

		static::$errors = $validation->messages();
		return false;
	}

	public static function loginIsValid($data)
	{
		$validation = Validator::make($data, static::$loginRules);

		if($validation->passes()) return true;

		static::$errors = $validation->messages();
		return false;
	}

	public function isAdmin()
	{
		return $this->admin;
	}

}
