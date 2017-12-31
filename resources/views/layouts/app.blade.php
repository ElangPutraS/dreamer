<!DOCTYPE html>
<html>
<head>
	<title>EPSLOG</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/ie10-viewport-bug-workaround.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/carousel.css')}}">
</head>
<body>
	@include('inc.navbar')
	<div class="container">
		@if (session('alert'))
		    <div class="alert alert-success">
		        {{ session('alert') }}
		    </div>
		@endif
		@if(Request::is('home'))
			@include('inc.showcase')
		@endif
		<div class="row">
			<div class="col-md-8 col-lg-8">
				@include('inc.messages')
				@yield('content')
				@if(Request::is('home'))
					@include('inc.features')
				@endif
			</div>
		@if(!Request::is('register' && 'login'))
			<div class="col-md-4 col-lg-4">
				@include('inc.sidebar')
			</div>
		@endif
		</div>
	</div>
	
	<footer id="footer" class="text-center">
		<p>Copyright 2017 &copy; Sinau</p>
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{asset('js/jquery.min.js')}}"><\/script>')</script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="{{asset('js/holder.min.js')}}"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="{{asset('js/ie10-viewport-bug-workaround.js')}}"></script>

</body>
</html>