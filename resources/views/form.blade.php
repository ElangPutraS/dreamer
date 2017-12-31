@extends ('layouts.app')

@section('content')
	<h1>User Registration</h1>
	<form class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('akun') ? ' has-error' : '' }}">
                            <div class="col-md-10">
                            	<label for="akun">Akun</label>
	                            <br>
                                <select id="akun" name="akun" required autofocus>
                                  <option value="Peserta">Peserta</option>
                                  <option value="Perusahaan">Perusahaan</option>
                                  <option value="Pemateri">Pemateri</option>
                                </select>
                                @if ($errors->has('akun'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('akun') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('profile') ? ' has-error' : '' }}">
	                        <div class="col-md-10">
	                            <label for="profile">Profil</label>
	                            <br>
                                <input id="profile" type="file" name="profile" value="{{ old('profile') }}" required autofocus>

                                @if ($errors->has('profile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
	                        <div class="col-md-10">
	                            <label>Username</label>
	                            <br>
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                        <div class="col-md-10">
	                            <label for="name">Nama Lengkap</label>
	                            <br>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('notp') ? ' has-error' : '' }} form-group{{ $errors->has('jk') ? ' has-error' : '' }}">
                        	<div class="col-md-5">
	                            <label for="jk">Jenis Kelamin</label>
	                            <br>
                                <input id="jk" type="radio" name="jk" value="L" checked="true" required autofocus> Laki-Laki
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input id="jk" type="radio" name="jk" value="P" required autofocus> Perempuan<br>

                                @if ($errors->has('jk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jk') }}</strong>
                                    </span>
                                @endif
                            </div>
	                        <div class="col-md-5">
	                            <label for="notp">No Telepon</label>
	                            <br>
                                <input id="notp" type="text" class="form-control" name="notp" value="{{ old('notp') }}" required autofocus>

                                @if ($errors->has('notp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
	                        <div class="col-md-10">
	                            <label for="alamat">Alamat</label>
	                            <br>
                                <textarea rows="4" id="alamat" class="form-control" name="alamat" value="{{ old('alamat') }}" required autofocus></textarea>

                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                        <div class="col-md-10">
	                            <label for="email">E-Mail Address</label>
	                            <br>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            

                            <div class="col-md-5">
                            	<label for="password">Password</label>
                            	<br>
                                <input class="form-control" id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-5">
                            	<label for="password-confirm" >Confirm Password</label>
                            	<br>
                                <input class="form-control" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-success btn-block">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
@endsection
@section('sidebar')
	@parent
	<p>Ini tambahannya nih</p>
@endsection