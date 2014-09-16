<?php

class ComplaintsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){

		if(Input::get('searchTitle')||Input::get('searchDescription')||Input::get('searchComplaint')){

			$searchComplaint = Input::get('searchComplaint');

			$searchTitle = Input::get('searchTitle');

			$searchDescription = Input::get('searchDescription');

			$complaint = Task::where('complaint', 'NOT LIKE', "No complaints so far.")
				->where(function($query) use ($searchTitle , $searchDescription, $searchComplaint){

				$query->where('title', 'LIKE', "%$searchTitle%")
					  ->where('complaint', 'LIKE', "%$searchComplaint%")
					  ->where('description', 'LIKE', "%$searchDescription%");

				})
				->paginate(5);


			return View::make('complaints.complaint', ['tasks' => $complaint]);
		}
		$complaint = Task::where('complaint', 'NOT LIKE', "No complaints so far.")->paginate(5);

		return View::make('complaints.complaint', ['tasks' => $complaint]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(){
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(){
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id){
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id){
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id){
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id){
		//
	}


}
