    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="{{asset('img/BPW.jpg')}}" alt="Generic placeholder image" width="140" height="140">
          <h2>@yield('first')</h2>
          <p><a class="btn btn-default" href="@yield('a')" role="button">+ Add Workshop Class</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="{{asset('img/css.jpg')}}" alt="Generic placeholder image" width="140" height="140">
          <h2>@yield('second')</h2>
          <p><a class="btn btn-default" href="@yield('b')" role="button">Manage User &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="{{asset('img/CWC.jpg')}}" alt="Generic placeholder image" width="140" height="140">
          <h2>@yield('third')</h2>
          <p><a class="btn btn-default" href="@yield('c')" role="button">Validate Registrant &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->