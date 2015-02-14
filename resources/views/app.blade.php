<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Task App</title>
	
	<link rel="stylesheet" href="{{ url('css/medium-editor.css') }}">
  <link rel="stylesheet" href="{{ url('css/themes/default.css') }}">
  <link rel="stylesheet" href="{{ url('css/medium-editor-insert.css') }}">
	<link href="/css/app.css" rel="stylesheet">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ route('projects.index') }}">Un named!</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		
				<ul class="nav navbar-nav">
				@if (Auth::guest())
					<li><a href="/auth/login">Please login, you will enjoy it :)</a></li>
				@else
						<li><a href="#">Welcome, {{ Auth::user()->name }}</a></li>
						<li>{!! link_to_route('projects.create', 'Create Project') !!}</li>
						
				@endif
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="/auth/login">Login</a></li>
						<li><a href="/auth/register">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/auth/logout">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>



	<div class="content">
		<div class="container">
			<div class="row">
				@if (Session::has('message'))
					<div class="col-md-12 flash alert-success">
						<p>{{ Session::get('message') }}</p>
					</div>
				@endif
			 	@if ($errors->any())
					<div class='col-md-12 flash alert-danger'>
						@foreach ( $errors->all() as $error )
							<p>{{ $error }}</p>
						@endforeach
					</div>
				@endif
				
			</div>
		</div>
		@yield('content')
</div>

	@yield('footer')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	{!! HTML::script('/js/timer.jquery.js') !!}
{!! HTML::script('/js/task-timer.js') !!}
</body>
</html>
