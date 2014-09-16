<?php

class SessionController extends Controller {

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return the users account
	 */
	public function show($employee){

		return View::make('users.userAccount');

	}

	public function login(){

		return View::make('users.userLogin');

	}

	public function store(){ //Create the (user)

		$email = Input::get('email');

		$password = Input::get('password');

		if( ! User::loginIsValid(Input::all())){

			return Redirect::back()->withInput()->withErrors(User::$errors);

		}
		if(Auth::attempt(array('email' => $email, 'password' => $password), true)){

			return Redirect::route('tasks.index');

		}

		return Redirect::route('pages.index');

	}

	public function destroy(){ //Logout

		Auth::logout();

		return Redirect::route('pages.index');

	}

}