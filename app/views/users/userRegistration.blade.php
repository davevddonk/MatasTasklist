@extends('home.master')

@section('container')

{{ Form::open(['route' => 'register.store', 'method' => 'post', 'class' => 'form-horizontal']) }}

	<div class="form-group">

		<h2>

			{{ Form::label('inputName3', 'Register', ['class' => 'col-md-6 control-label']) }}

		</h2>

	</div>

	<div class="form-group">

		{{ Form::label('firstname', 'Firstname:', ['class' => 'col-md-5 control-label']) }}

		<div class="col-md-3">

			{{ Form::text('firstname', null, ['class' => 'form-control', 'placeholder' => 'Firstname']) }}

			@if( ! $errors->isEmpty())

				<div class="alert alert-danger" role="alert">

					{{$errors->first("firstname")}}

				</div>

			@endif

		</div>

	</div>

	<div class="form-group">

		{{ Form::label('lastname', 'Lastname:', ['class' => 'col-md-5 control-label']) }}

		<div class="col-md-3">

			{{ Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Lastname']) }}

			@if( ! $errors->isEmpty())

				<div class="alert alert-danger" role="alert">

					{{$errors->first("lastname")}}

				</div>

			@endif

		</div>

	</div>

	<div class="form-group">

		{{ Form::label('email', 'E-mail:', ['class' => 'col-md-5 control-label']) }}

		<div class="col-md-3">

			{{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) }}

			@if( ! $errors->isEmpty())

				<div class="alert alert-danger" role="alert">

					{{$errors->first("email")}}

				</div>

			@endif

		</div>

	</div>

	<div class="form-group">

		{{ Form::label('inputPassword3', 'Password:', ['class' => 'col-md-5 control-label']) }}

		<div class="col-md-3">

			{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}

			@if( ! $errors->isEmpty())

				<div class="alert alert-danger" role="alert">

					{{$errors->first("password")}}

				</div>

			@endif

		</div>

	</div>

	<div class="form-group">

		<div class="col-md-offset-5 col-md-1">

			{{ Form::button('Register', ['class' => 'btn btn-primary btn-block', 'type' => 'submit'])}}

		</div>

	</div>

{{ Form::close() }}

@stop