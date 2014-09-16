<?php 
if (Auth::attempt(array('email' => $email, 'password' => $password, 'active' => 1), true))
{
	return Redirect::intended('userTasks');
}

//	$users = DB::select('SELECT * FROM employees');
//	dd($users);