<?php
if(Auth::check()){

	$firstname = Auth::user()->firstname;

	$lastname = Auth::user()->lastname;

	$email = Auth::user()->email;

}

?>

<!doctype html>

<html>

	<head>

		<title>Matas Dashboard | Welcome to Dave&#039;s app.</title>

		<link rel="shortcut icon" href="http://www.matas.nl/favicon.ico">

		<meta charset="utf-8">

		{{ HTML::style('css/spacelab.css') }}

		<!-- 		nice looking css
			{{ HTML::style('css/cerulean.css') }}
			{{ HTML::style('css/cosmo.css') }}
			{{ HTML::style('css/cyborg.css') }}
			{{ HTML::style('css/darkly.css') }}
			{{ HTML::style('css/flatly.css') }}
			{{ HTML::style('css/journal.css') }}
			{{ HTML::style('css/lumen.css') }}
			{{ HTML::style('css/paper.css') }}
			{{ HTML::style('css/readable.css') }}
			{{ HTML::style('css/simplex.css') }}
			{{ HTML::style('css/slate.css') }}
			{{ HTML::style('css/spacelab.css') }}
			{{ HTML::style('css/united.css') }}
		 -->

		{{ HTML::style('css/main.css') }}

		{{ HTML::style('css/slider.css') }}

		{{ HTML::style('css/font-awesome.css') }}

	</head>

	<body>

		@include('home.navigation')

		<div class="container">

			@yield('container')

		</div>

		<div class="mainContainer">

			@yield('mainContainer')

		</div>

		{{ HTML::script('js/jquery.js') }}

		{{ HTML::script('js/slider.js') }}

		{{ HTML::script('js/bootstrap.js') }}

	</body>

</html>