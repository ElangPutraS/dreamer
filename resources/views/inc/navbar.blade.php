
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/">Sinau</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                  @guest  
                    <li class="{{Request::is('home') ? 'active' : ''}}"><a href="\home">Home</a></li>
                  @else
                    <li class="{{Request::is('home') ? 'active' : ''}}"><a href="\Homepage">Home</a></li>
                  @endguest
                  <li class="{{Request::is('about') ? 'active' : ''}}"><a href="\about">About</a></li>
                  <li class="{{Request::is('contact') ? 'active' : ''}}"><a href="\contact">Contact</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                  
                                    <li><a href="{{route('User.edit', Auth::user()->id )}}"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit Profile</a></li>
                                    <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;Workshop Class</a></li>
                                    <li><a href="#"><i class="glyphicon glyphicon-check"></i>&nbsp;&nbsp;Finished Workshop</a></li>
                          
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @endguest
                    </ul>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="{{ asset('js/app.js') }}"></script>
    <script>window.jQuery || document.write('<script src="{{asset('js/jquery.min.js')}}"><\/script>')</script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{asset('js/ie10-viewport-bug-workaround.js')}}"></script>
  <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs2.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582HVlH3eBnL316jhuDy0bONZZn7yKR4HqkEOPFkBWo8Oo3dduJ7pXnJjErMu2gcuLLiyLFROSP9mUmNRK7mdWc2q%2fiACgaB16KrYJwgg5Mxp6boQi50MtkZOnh1FaztqPMH1%2b3hmGz%2bV4zBqEoJ68FhKap67xApRA6YO2kNiOOYsXdwZyWbaYH%2fgMdfESPAd5q%2f9mBq6yBcMxhrvlfZj2pl%2bxAaVPVZHZQoBS%2f4XMDPeVyAiB3Mj9b3MZixKTU%2fFwk6v6yxP12fOPML1gD9hpPIcDYndbAvyNyutjaufMs7kaAmDcyDKFBI3mluR%2f4mDw8rC9rz7GBPnZM6FRFJggS7WP5JKd3DUcX7Sa5URuc%2bwbsIT9TggoV2jg%2bz891HDfKWoP32o0CfjN6Mlnh61oX1QOBA3ATUDPksc6NGJ8azgLHIkNVtqJcJs5F%2b9lyY8lBHNTR75d0732S31VR1M7T7VIII%2fgwSbmK7EJpXva3zpZedFuMmlswiaW%2fsZQmX08hakyqTiFgSV%2fUXBWZ7IzzgyFDtgTp7Afwc6EdeZWMhTtB1GzNNCED%2bpIHRE%2f950LawSA%2bJTxk2cjJ5tVp8%2bZNBxbhRgIxDOCuU%2b4Auir7dml" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script>
          </div>
        </nav>
