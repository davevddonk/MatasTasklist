<?php

class RegisterController extends Controller{

	/**
	 * Show the form for creating a new user.
	 *
	 * @return registration page
	 */
	public function create(){

		return View::make('users.userRegistration');
	}

	/**
	 * Store a newly created user in the database.
	 *
	 * @return to the home page
	 */
	public function store(){ //Create an employee

		if ( ! User::registerIsValid(Input::all())){

			return Redirect::back()->withInput()->withErrors(User::$errors);

		}

		$addEmployee = Employee::create(Input::all());
		$addEmployee->password = Hash::make(Input::get('password'));
		$addEmployee->save();

		return Redirect::route('pages.index');

	}

}