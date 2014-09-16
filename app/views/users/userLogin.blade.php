@extends('home.master')

@section('mainContainer')

{{ Form::open(['route' => 'session.store', 'method' => 'post', 'class' => 'form-horizontal']) }}

	<div class="form-group">

		<h2>

			{{ Form::label('inputName3', 'Matas Dashboard', ['class' => 'col-md-7 control-label']) }}

		</h2>

	</div>

	<div class="form-group">

		{{ Form::label('email', 'E-mail', ['class' => 'col-md-4 control-label']) }}

			<div class="col-md-5">

				{{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) }}

				@if( ! $errors->isEmpty())

					<div class="alert alert-danger" role="alert">

						{{$errors->first("email")}}

					</div>

				@endif

			</div>

	</div>

	<div class="form-group">

		{{ Form::label('inputPassword3', 'Password:', ['class' => 'col-md-4 control-label']) }}

			<div class="col-md-5">

				{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'])}}

				@if( ! $errors->isEmpty())

					<div class="alert alert-danger" role="alert">

						{{$errors->first("password")}}

					</div>

				@endif

			</div>

	</div>

	<div class="form-group">

		<div class="col-md-offset-4 col-md-2">

			{{ Form::button('Sign in', ['class' => 'btn btn-primary btn-block', 'type' => 'submit'])}}

		</div>

	</div>

{{ Form::close() }}

@stop