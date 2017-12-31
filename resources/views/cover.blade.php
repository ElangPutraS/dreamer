@extends ('layouts.cover')

@section('content')
<style type="text/css">
    body{
      background-image: url('/img/9.jpg');
      background-size: cover;
    }
  </style>
    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand"><a href="/">Sinau</a></h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li><a href="/home">Home</a></li>
                  <li><a href="/about">About</a></li>
                  <li><a href="/contact">Contact</a></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">Sinau</h1>
            <p class="lead">Welcome to our lovely site, you won't find any difficult to join and find any workshop again ! Because with Sinau you can do both of them. Our website will facilitate all of your need in study, so don't worry about the facilities</p>
            <p class="lead">
              <a href="{{ route('register') }}" class="btn btn-lg btn-default">Sign Up</a>
              <a href="{{ route('login') }}" class="btn btn-lg btn-default">Log In</a>
            </p>
          </div>
          <div class="mastfoot">
            <div class="inner">
              <p>Copyright 2017 &copy; Sinau</p>
            </div>
          </div>

        </div>

      </div>

    </div>
@endsection