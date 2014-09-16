<nav class="navbar navbar-default navbar-fixed-top" role="navigation">

	<div class="navigationBar">

		<ul class="nav nav-tabs" role="tablist">

			<li>{{ link_to_route('pages.index', 'Home') }}</li>

			<li>{{ link_to_route('register.create', 'Register') }}</li>

			@if(Auth::check())

				<li class="dropdown">

					<a href="tasks.index" class="dropdown-toggle" data-toggle="dropdown">Tasks<i class="fa fa-chevron-down"></i>

					</a>

					<ul class="dropdown-menu" role="menu">

						<li>{{ link_to_route('tasks.index', 'All Tasks') }}</li>

						@if(Auth::user()->admin == 'true')

							<li>{{ link_to_route('tasks.create', 'Add Tasks') }}</li>

							<li class="divider"></li>

							<li>{{ link_to_route('complaints.index', 'Complaints') }}</li>

							<li>{{ link_to_route('tasks.showrecyclebin', 'Recycle Bin') }}</li>

						@endif

					</ul>

				</li>

				<ul class="nav navbar-nav navbar-right">

					<p class="dropdown-toggle navbar-text navbar-right" data-toggle='dropdown'>Signed in as {{ Auth::user()->firstname }}

					<i class="fa fa-chevron-down"></i>

					</p>

					<ul class="dropdown-menu" role="menu">

						<li>{{ link_to_route('tasks.show', 'My Tasks')}}</li>

						<li>{{ link_to_route('session.show', 'Account', [Auth::user()->firstname]) }}</li>

						<li class="divider"></li>

						<li>{{ link_to_route('session.destroy', 'Logout') }}</li>

					@else

						<li>{{ link_to_route('session.login', 'Login') }}</li>

						<p class="navbar-text navbar-right">Signed in as Guest</p>

					@endif

				</ul>

			</ul>

		</ul>

	</div>

</nav>


<!-- <div class='menu list-group'>

	<a class="list-group-item" href="/">

		<i class="icons fa fa-home fa-lg"></i>&nbsp; Home

	</a>

	<a class="list-group-item" href="/register">

		<i class="icons fa fa-pencil fa-lg"></i>&nbsp; Register

	</a>

	<a class="list-group-item" href="/login">

		<i class="icons fa fa-sign-in fa-lg"></i>&nbsp; Login

	</a>

	@if(Auth::check())

	<a class="list-group-item" href="/tasks">

		<i class="icons fa fa-files-o fa-lg"></i>&nbsp; All tasks

	</a>

	<a class="list-group-item" href="/tasks/create">

		<i class="icons fa fa-plus-square fa-lg"></i>&nbsp; Add task

	</a>

	<a class="list-group-item" href="/tasks/recycle-bin">

		<i class="icons fa fa-trash fa-lg"></i>&nbsp; Deleted tasks

	</a>

	<a class="list-group-item" href="/tasks/%7Btasks%7D">

		<i class="icons fa fa-file-o fa-lg"></i>&nbsp; My tasks

	</a>

	<a class="list-group-item" href="/user/{{ Auth::user()->firstname }}">

		<i class="icons fa fa-user fa-lg"></i>&nbsp; {{ Auth::user()->firstname }}

	</a>

	<a class="list-group-item" href="/logout">

		<i class="icons fa fa-sign-out fa-lg"></i>&nbsp; Logout

	</a>

	@endif

</div>
 -->
<!--  <div class="col-md-2 list-group">

	<a target="_blank" class="list-group-item" href="http://store.steampowered.com/">

		<i class="steam fa fa-steam-square fa-lg"></i>&nbsp; Steam

	</a>
	<a target="_blank" class="list-group-item" href="https://www.youtube.com/feed/subscriptions">

		<i class="youtube fa fa-youtube fa-lg"></i>&nbsp; Youtube

	</a>
	<a target="_blank" class="list-group-item" href="http://www.twitch.tv/directory/game/Dota%202">

		<i class="twitch fa fa-twitch fa-lg"></i>&nbsp; Twitch

	</a>

</div> -->