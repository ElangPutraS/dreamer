<style type="text/css">
    body{
      background-image: url('/img/9.jpg');
      background-size: 1368px 720px;
    }
  </style>
  <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">
          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Sinau</h3>
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
            @if (session('alert'))
                <div class="alert alert-success">
                    {{ session('alert') }}
                </div>
            @endif
            {!! Form::open(['class'=>'form-signin','route' => 'daftar.login']) !!}
            
                <h2 class="form-signin-heading">Please Sign in</h2>
                {{Form::label('username', 'Username',['class'=>'sr-only'])}}
                {{Form::text('username', '', ['class'=>'form-control','placeholder'=>'Enter Username'])}}

                {{Form::label('pass', 'Password',['class'=>'sr-only'])}}
                <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required>
                {{Form::submit('Sign In', ['class'=>'btn btn-primary btn-lg btn-block'])}}
                
            {!! Form::close() !!}

          </div>
          <div class="mastfoot">
            <div class="inner">
              <p>Copyright 2017 &copy; Sinau</p>
            </div>
          </div>
        </div>
      </div>
  </div>