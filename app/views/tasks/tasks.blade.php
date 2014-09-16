@extends('home.master')

@section('container')

@if(Auth::check())

<div class="page-header">

	<h1>

		All tasks <small>An overview of all the tasks in the system</small>

		{{ Form::open(['route' => 'tasks.index', 'method' => 'get', 'class' => 'pull-right search-form']) }}

			<div class="input-group">

				<input type="text" name="search" class="form-control" placeholder="Search...">

				<span class="input-group-btn">

					{{ Form::button('<i class="fa fa-search"></i>', ['class' => 'btn btn-primary', 'type' => 'submit'])}}

				</span>

			</div>

		{{ Form::close() }}

	</h1>

</div>


<table class="table">

	<thead>

		<tr>

			<th colspan="2">

				<h2>Task Name</h2>

			</th>

			<th>

				<h2>Task Description</h2>

			</th>

		</tr>

	</thead>

	<tbody>

		@foreach ($tasks as $task)

			<tr>

				<td>{{ $task->id }}</td>

				<td class="col-md-3 text-primary">{{ $task->title }}</td>

				<td class="col-md-7">{{ $task->description }}</td>

				<td>

				@if($task->completed_at == '-0001-11-30 00:00:00')

					<span class="label label-default">Completed</span>

					@if($task->complaint == 'No complaints so far.')

						<span class='label label-default'>Complaint</span>

					@else

						<span class='label label-warning'>Complaint</span>

					@endif

				@else

					<span class="label label-success">Completed</span>

					@if($task->complaint == 'No complaints so far.')

						<span class='label label-default'>Complaint</span>

					@else

						<span class='label label-warning'>Complaint</span>

					@endif

				@endif

				</td>

				<td class="col-md-1">

					<button class="btn btn-danger btn-md btn-block" data-toggle="modal" data-target="#myComplaintModal{{ $task->id }}">Add Complaint</button>

					<button class="btn btn-success btn-md btn-block" data-toggle="modal" data-target="#myEditModal{{ $task->id }}">Edit Task</button>

				</td>

			</tr>

		@endforeach

	</tbody>

	<tfoot>

		<tr>

			<td colspan="3">{{ $tasks->appends(Request::input())->links(); }}</td>

		</tr>

	</tfoot>

</table>

@foreach ($tasks as $task)

	@include('tasks.partials.complaint-modal')

	@include('tasks.partials.edit-modal')

@endforeach

@endif

@stop