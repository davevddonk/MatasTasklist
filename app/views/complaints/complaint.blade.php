@extends('home.master')

@section('container')

@if(Auth::check())

<div class="page-header">

	<h1>

		Complaints <small>An overview of the complaints in the system</small>

		{{ Form::open(['route' => 'complaints.index', 'method' => 'get', 'class' => 'pull-right search-form']) }}

		<div class="input-group-btn">

			<div class="input-group">

				<input type="text" name="searchComplaint" class="form-control" placeholder="Search Complaint...">

			</div>

			<div class="input-group">

				<input type="text" name="searchDescription" class="form-control" placeholder="Search Description...">

			</div>

			<div class="input-group">

				<input type="text" name="searchTitle" class="form-control" placeholder="Search Title...">

				<span class="input-group-btn">

					{{ Form::button('<i class="fa fa-search"></i>', ['class' => 'btn btn-primary', 'type' => 'submit'])}}

				</span>

			</div>

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

			<th>

				<h2>Complaint</h2>

			</th>

		</tr>

	</thead>

	<tbody>

		@foreach ($tasks as $task)

			<tr>

				<td>{{ $task->id }}</td>

				<td class="col-md-3 text-primary">{{ $task->title }}</td>

				<td class="col-md-6">{{ $task->description }}</td>

				<td class="col-md-3">{{ $task->complaint }}</td>

			</tr>

		@endforeach

	</tbody>

	<tfoot>

		<tr>

			<td colspan="3">{{ $tasks->appends(Request::input())->links(); }}</td>

		</tr>

	</tfoot>

</table>

@endif

{{ Form::button('<i class="fa fa-search-plus"></i>', ['class' => 'btn btn-primary', 'type' => 'submit'])}}
@stop