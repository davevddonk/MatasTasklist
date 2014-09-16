<?php

class PagesController extends Controller {

	/**
	 * Display the home page
	 *
	 * @return Response
	 */
	public function index(){

		return View::make('home.home');

	}

}