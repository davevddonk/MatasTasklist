@extends('home.master')

@section('container')

{{ Form::open(['route' => 'tasks.store', 'method' => 'post', 'class' => 'form-horizontal']) }}

	<div class="form-group">

		<h2>

			{{ Form::label('header', 'Add Tasks', ['class' => 'col-md-6 control-label']) }}

		</h2>

	</div>

	<div class="form-group">

		{{ Form::label('title', 'Title:', ['class' => 'col-md-5 control-label']) }}

		<div class="col-md-3">

			{{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) }}

			@if( ! $errors->isEmpty())

				<div class="alert alert-danger" role="alert">

					{{$errors->first("title")}}

				</div>

			@endif

		</div>

	</div>

	<div class="form-group">

		{{ Form::label('description', 'Description:', ['class' => 'col-md-5 control-label']) }}

		<div class="col-md-3">

			{{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => '5']) }}

			@if( ! $errors->isEmpty())

				<div class="alert alert-danger" role="alert">

					{{$errors->first("description")}}

				</div>

			@endif

		</div>

	</div>

	<div class="form-group">

		{{ Form::label('category_id', 'Category ID:', ['class' => 'col-md-5 control-label']) }}

		<div class="col-md-3">

			{{ Form::text('category_id', null, ['class' => 'form-control', 'placeholder' => 'Category id']) }}

			@if( ! $errors->isEmpty())

				<div class="alert alert-danger" role="alert">

					{{$errors->first("category_id")}}

				</div>

			@endif

		</div>

	</div>

	<div class="form-group">

		{{ Form::label('employee_id', 'Employee ID:', ['class' => 'col-md-5 control-label']) }}

		<div class="col-md-3">

			{{ Form::text('employee_id', null, ['class' => 'form-control', 'placeholder' => 'Employee id']) }}

			@if( ! $errors->isEmpty())

				<div class="alert alert-danger" role="alert">

					{{$errors->first("employee_id")}}

				</div>

			@endif

		</div>

	</div>

	<div class="form-group">

		<div class="col-md-offset-5 col-md-1">

			{{ Form::button('Add task', ['class' => 'btn btn-primary btn-block', 'type' => 'submit'])}}

		</div>

	</div>

{{ Form::close() }}

@stop