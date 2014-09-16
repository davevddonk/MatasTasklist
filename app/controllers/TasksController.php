<?php

use Carbon\Carbon;

class TasksController extends Controller {

	/**
	 * Display the page with all the tasks.
	 *
	 * @return all tasks page
	 */
	public function index(){

		if(Input::has('search')){

			$search = Input::get('search');

			$tasks = Task::where('description', 'LIKE', "%$search%")
				->orwhere('title', 'LIKE', "%$search%")
				->paginate(5);

			return View::make('tasks.tasks', ['tasks' => $tasks]);

		}

		$tasks = Task::paginate(5);

		return View::make('tasks.tasks', ['tasks' => $tasks]);

	}

	public function create(){ //show the add tasks page

		if(Auth::user()->admin == 'true'){

			return View::make('tasks.addTasks');

		}

			return Redirect::route('pages.index');

	}

	public function store(){ //add the task

		if ( ! Task::taskIsValid(Input::all())){

			return Redirect::back()->withInput()->withErrors(Task::$errors);

		}

		$addTasks = Task::create(Input::all());
		$addTasks->complaint = 'No complaints so far.';
		$addTasks->save();

		return Redirect::route('tasks.index');

	}

	public function show(){ //show my tasks page

		if(Auth::check()){

			$id = Auth::user()->id;

			if(Input::has('search')){

				$search = Input::get('search');

				$taskIds = Task::where('employee_id', '=', $id)
					->where(function($query) use ($search)
					{
						$query->where('description', 'LIKE', "%$search%")
							  ->orwhere('title', 'LIKE', "%$search%");
					})
					->paginate(5);

				return View::make('tasks.userTasks', ['taskIds' => $taskIds]);

			}

			$taskIds = Task::where('employee_id', '=', $id)->paginate(5);

			return View::make('tasks.userTasks', ['taskIds' => $taskIds]);

		}

		return View::make('home.home');

	}

	public function destroy($deletedTask){ // permanently destroy the task

		$delete = Task::withTrashed()->find($deletedTask);
		$delete->forceDelete();

		return Redirect::route('tasks.showrecyclebin');

	}

	public function restore($restoreTask){ // restore the task

		$restore = Task::withTrashed()->find($restoreTask);
		$restore->restore();

		return Redirect::route('tasks.showrecyclebin');

	}

	public function recycleBin($task){ //put the task into the recycle bin

		if(Auth::check()){

			$id = $task;

			Task::destroy($id);

			if(Auth::user()->admin == 'true'){

				$deletedTasks = Task::onlyTrashed()->paginate(5);

				return Redirect::Route('tasks.index', ['deletedTasks' => $deletedTasks]);

			}

		}

		return Redirect::route('tasks.index');

	}

	public function showRecycleBin(){ //show the recycle bin

		if(Auth::user()->admin == 'true'){

			if(Input::has('search')){

				$search = Input::get('search');

				$deletedTasks = Task::onlyTrashed()
					->where(function($query) use ($search)
					{
						$query->where('description', 'LIKE', "%$search%")
							  ->orwhere('title', 'LIKE', "%$search%");
					})
					->paginate(5);

				return View::make('tasks.deletedTasks', ['deletedTasks' => $deletedTasks]);

			}

			$deletedTasks = Task::onlyTrashed()->paginate(5);

			return View::make('tasks.deletedTasks', ['deletedTasks' => $deletedTasks]);
		}

		return Redirect::to('home.home');

	}

	public function update($task){ //update the title and description of the task

		$task = Task::find($task);

		$title = Input::get('title');

		$description = Input::get('description');

		$task->title = $title;
		$task->description = $description;
		$task->save();

		return Redirect::route('tasks.index');

	}

	public function notcompleted($task){

		$task = Task::find($task);

		$date = Carbon::create(0, 0, 0, 0, 0, 0);

		$task->completed_at = $date; // null
		$task->save();

		return Redirect::route('tasks.index');

	}

	public function completed($task){ //update the completed_at timestamp

		// taak ophalen
		$date = Carbon::now();

		$task = Task::find($task);
		$task->completed_at = $date;
		$task->save();
		// taak opslaan

		return Redirect::route('tasks.index');

	}

	public function complaint($task){

		$task = Task::find($task);

		$input = Input::get('complaint');

		if($input == ''){

			$input = 'No complaints so far.';

			$task->complaint = $input;
			$task->save();

			return Redirect::route('tasks.index');

		}

		$task->complaint = $input;
		$task->save();

		return Redirect::route('tasks.index');

	}

}