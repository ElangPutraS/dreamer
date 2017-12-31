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
  <style type="text/css">
    body{
      background-image: url('/img/bg.jpg');
      background-size: 345 456;
    }
  </style>
	@include('inc.navbarUser')
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="{{asset('img/coverUser.png')}}">
          <div class="container">
            <div class="carousel-caption">
              <h1>@yield('nama')</h1>
              <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Edit Profile</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="{{asset('img/2nd.jpg')}}" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Search Workshop Class</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="{{asset('img/3rd.jpeg')}}" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">See Finished Workshop</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->

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
			<div class="col-md-12 col-lg-12">
				@include('inc.messages')
				@yield('content')
				@if(Request::is('home'))
					@include('inc.features')
				@endif
			</div>
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