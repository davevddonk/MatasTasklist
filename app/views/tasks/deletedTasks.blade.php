@extends('home.master')

@section('container')

@if(Auth::check())

<div class="page-header">

	<h1>

		Deleted Tasks <small>An overview of all deleted tasks</small>

		{{ Form::open(['route' => 'tasks.showrecyclebin', 'method' => 'get', 'class' => 'pull-right search-form']) }}

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

		@foreach ($deletedTasks as $deletedTask)

			<tr>

				<td>{{ $deletedTask->id }}</td>

				<td class="col-md-3 text-primary">{{ $deletedTask->title }}</td>

				<td class="col-md-8">{{ $deletedTask->description }}</td>

				<td>

					@if($deletedTask->completed_at == '-0001-11-30 00:00:00')

						<span class="label label-default">Completed</span>

						@if($deletedTask->complaint == 'No complaints so far.')

							<span class='label label-default'>Complaint</span>

						@else

							<span class='label label-warning'>Complaint</span>

						@endif

					@else

						<span class="label label-success">Completed</span>

						@if($deletedTask->complaint == 'No complaints so far.')

							<span class='label label-default'>Complaint</span>

						@else

							<span class='label label-warning'>Complaint</span>

						@endif

					@endif

				</td>

				<td class="col-md-1">

						<button class="btn btn-success btn-md btn-block" data-toggle="modal" data-target="#areYouSureRestore{{ $deletedTask->id }}">Restore Task</button>

						<button class="btn btn-danger btn-md btn-block" data-toggle="modal" data-target="#areYouSureDelete{{ $deletedTask->id }}">Delete Task</button>

				</td>

			</tr>

		@endforeach

	</tbody>

	<tfoot>

		<tr>

			<td colspan="3">{{ $deletedTasks->appends(Request::input())->links(); }}</td>

		</tr>

	</tfoot>

</table>

@foreach ($deletedTasks as $deletedTask)

	@include('tasks.partials.areYouSureDelete-modal', ['task' => $deletedTask])

	@include('tasks.partials.areYouSureRestore-modal', ['task' => $deletedTask])

@endforeach

@endif

@stop