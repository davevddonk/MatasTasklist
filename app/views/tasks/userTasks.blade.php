@extends('home.master')

@section('container')

@if(Auth::check())

<div class="page-header">

	<h1>

		My tasks <small>An overview of all your tasks</small>

		{{ Form::open(['route' => 'tasks.show', 'method' => 'get', 'class' => 'pull-right search-form']) }}

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

		@foreach ($taskIds as $taskId)

			<tr>

				<td>{{ $taskId->id }}</td>

				<td class="col-md-3 text-primary">{{ $taskId->title }}</td>

				<td class="col-md-8">{{ $taskId->description }}</td>

				<td>

				@if($taskId->completed_at == '-0001-11-30 00:00:00')

					<span class="label label-default">Completed</span>

					@if($taskId->complaint == 'No complaints so far.')

						<span class='label label-default'>Complaint</span>

					@else

						<span class='label label-warning'>Complaint</span>

					@endif

				@else

					<span class="label label-success">Completed</span>

					@if($taskId->complaint == 'No complaints so far.')

						<span class='label label-default'>Complaint</span>

					@else

						<span class='label label-warning'>Complaint</span>

					@endif

				@endif

				</td>

				<td class="col-md-1">

					<button class="btn btn-danger btn-md btn-block" data-toggle="modal" data-target="#myComplaintModal{{ $taskId->id }}">Add Complaint</button>

					<button class="btn btn-success btn-md btn-block" data-toggle="modal" data-target="#myEditModal{{ $taskId->id }}">Edit Task</button>

				</td>

			</tr>

		@endforeach

	</tbody>

	<tfoot>

		<tr>

			<td colspan="3">{{ $taskIds->appends(Request::input())->links(); }}</td>

		</tr>

	</tfoot>

</table>

@foreach ($taskIds as $taskId)

	@include('tasks.partials.complaint-modal', ['task' => $taskId])

	@include('tasks.partials.edit-modal', ['task' => $taskId])

@endforeach

@endif

@stop