<?php

Route::get('/', ['as' => 'pages.index', 'uses' => 'PagesController@index']);

Route::post('/', ['as' => 'session.store', 'uses' => 'SessionController@store']);

Route::resource('register', 'RegisterController');

Route::get('user/{user}', ['as' => 'session.show','uses' => 'SessionController@show']);

Route::get('login', ['as' => 'session.login', 'uses' => 'SessionController@login']);

Route::group(['before' => 'auth'], function(){

	Route::get('tasks/recycle-bin/{task}', ['as' => 'tasks.recyclebin', 'uses' => 'TasksController@recycleBin']);

	Route::get('tasks/recycle-bin/', ['as' => 'tasks.showrecyclebin', 'uses' => 'TasksController@showRecycleBin']);

	Route::resource('tasks', 'TasksController');

	Route::get('tasks/restore/{task}', ['as' => 'tasks.restore', 'uses' => 'TasksController@restore']);

	Route::get('logout', ['as' => 'session.destroy', 'uses' => 'SessionController@destroy']);

	Route::get('completed/{task}', ['as' => 'tasks.completed', 'uses' => 'TasksController@completed']);

	Route::get('notcompleted/{task}', ['as' => 'tasks.notcompleted', 'uses' => 'TasksController@notcompleted']);

	Route::put('complaint/{task}', ['as' => 'tasks.complaint', 'uses' => 'TasksController@complaint']);

	Route::resource('complaints', 'ComplaintsController');
});

// Route::get('{user}', ['as' => 'user.store', 'uses' => 'UserController@store']);
// link_to_route('user.store', Auth::user()->firstname, Auth::user()->firstname)