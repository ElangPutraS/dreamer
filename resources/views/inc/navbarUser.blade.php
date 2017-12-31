<div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Sinau</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav ">
                @if(trim($__env->yieldContent('akun')) =='Admin')
                  <li class="{{Request::is('admin') ? 'active' : ''}}"><a href="/admin">Home</a></li>
                  <li><a href="#about">About</a></li>
                  <li><a href="#contact">Contact</a></li>
                @else
                  <li class="{{Request::is('Homepage') ? 'active' : ''}}"><a href="/Homepage">Home</a></li>
                  <li><a href="#about">About</a></li>
                  <li><a href="#contact">Contact</a></li>
                @endif
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello, @yield('username') <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    @if(trim($__env->yieldContent('akun')) =='Admin')
                      <li><a href="/daftar">See User List</a></li>
                      <li><a href="#">See Donation</a></li>
                      <li><a href="#">See Workshop Class</a></li>
                      <li><a href="#">Validate User</a></li>
                    @else
                      <li><a href="{{route('User.edit', Auth::user()->id )}}"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit Profile</a></li>
                      <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;Workshop Class</a></li>
                      <li><a href="#"><i class="glyphicon glyphicon-check"></i>&nbsp;&nbsp;Finished Workshop</a></li>
                    @endif 
                    <li role="separator" class="divider"></li>
                    <li>
                      <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                          <i class="glyphicon glyphicon-log-out"></i>&nbsp;&nbsp;Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        
      </div>
    </div>