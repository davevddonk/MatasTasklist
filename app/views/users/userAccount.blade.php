@extends('home.master')

@section('container')

<?php

	if(Auth::check()){

		$firstname = Auth::user()->firstname;
		$lastname = Auth::user()->lastname;
		$email = Auth::user()->email;

	}

?>
{{ HTML::image('Testimg.jpg', 'Wrong picture location')}}

@if(Auth::check())

	<table class="userCridentials navbar-text">

		<tr>

			<td>Firstname: </td><td>{{ $firstname }}</td>

		</tr>

		<tr>

			<td>Lastname: </td><td>{{ $lastname }}</td>

		</tr>

		<tr>

			<td>E-mail: </td><td>{{ $email }}</td>

		</tr>

	</table>

	@endif

@stop