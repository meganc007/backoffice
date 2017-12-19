<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>CySy Back Office 2.0</title>

		<!-- Favicon -->
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Oswald|Play" rel="stylesheet">

		<!-- Project CSS -->
		<link href="{{URL::to('public/styles.css')}}" rel="stylesheet">
	</head>
	<body>
		<div class="container-fluid topbar">
			<div class="row">
				<div class="col-sm-12">
					@if ( Auth::check() )
						<div class="menu">
							<img src="{{ URL::asset('public/assets/nav.png') }}" alt="Click here to view the menu" id="hamburger">
							<p>Menu</p>
							@include('partials.nav')
						</div>
					@endif
				</div>

				<div class="text-center col-sm-12">
					@if ( Auth::check() )
						<a href="{{ route('index') }}"><img src="{{ URL::asset('public/assets/logo.png') }}" alt="CySy logo" class="logo"></a>
					@else
						<a href="{{ route('index') }}"><img src="{{ URL::asset('public/assets/logo.png') }}" alt="CySy logo" class="logo"></a>
					@endif
				</div>

				@if (Auth::check())
					<div class="pull-right signout">
						<a href="{{route('signout')}}">Sign Out</a>
					</div>
				@endif

			</div>

			<div class="col-sm-12">
				@include('partials.alerts')
			</div>
		
		</div>

		<div class="container-fluid" id="content-container">
			@if ( Auth::check() )
				<div class="container-fluid welcome">
					<div class="row">
						<p>Welcome{{ isset(Auth::user()->fname) ? ', ' . Auth::user()->fname : '!'}}</p>
					</div>
				</div>
			@endif

			@yield('content')
		</div>
	</body>

	<!-- Start of footer -->
	<footer class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<p>&copy; CyberSytes <?php echo date("Y"); ?> </p>
			</div>
		</div>

		<!-- JQuery -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		
		@yield('scripts')
			{{ HTML::script('public/js/nav.js') }}

	</footer>
</html>