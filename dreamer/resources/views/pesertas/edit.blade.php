@extends ('layouts.appUser')

@section('username')
	
	{{ Auth::user()->username }}
@endsection

@section('akun')
	{{ Auth::user()->akun }}
@endsection

@section('ide')
	{{ Auth::user()->id }}
@endsection

@section('nama')
	{{ Auth::user()->name }}
@endsection

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h1>Edit Profile</h1>
	</div>
	<div class="panel-body">
	
	{!! Form::model($user, ['method' => 'PATCH','route' => ['User.update', $user->id]]) !!}
		<div class="form-group">
			{{Form::label('akun', 'Jenis Akun')}}<br>
			{{ Form::select('akun', [
			   'Peserta' => 'Peserta',
			   'Pemateri' => 'Pemateri',
			   'Donatur' => 'Donatur'],$user->akun
			) }}
		</div>
		<div class="form-group">
	    	{{Form::label('username', 'Username')}}
	    	{{Form::text('username', $user->username, ['class'=>'form-control'])}}
	    </div>
	    <div class="form-group">
	    	{{Form::label('name', 'Nama Lengkap')}}
	    	{{Form::text('name', $user->name, ['class'=>'form-control'])}}
	    </div>
	    <div class="form-group">
	    	{{Form::label('alamat', 'Alamat')}}
	    	{{Form::textarea('alamat', $user->alamat, ['class'=>'form-control'])}}
	    </div>
	    <div class="form-group">
	    	{{Form::label('jk', 'Jenis Kelamin')}}
	    	@for ($i = 0; $i < 44; $i++)
			    &nbsp
			@endfor
	    	{{Form::label('notp', 'Nomor Telepon')}}
	    	<br>
	    	{{ Form::radio('jk', 'L', $user->jk == 'L' ? 'true' : '')}}Laki-Laki
	    	@for ($i = 0; $i < 10; $i++)
			    &nbsp
			@endfor
			{{ Form::radio('jk', 'P', $user->jk == 'P' ? 'true' : '')}}Perempuan
			@for ($i = 0; $i < 26; $i++)
			    &nbsp
			@endfor
			{{Form::text('notp', $user->notp)}}
	    </div>
	    <div class="form-group">
	    	{{Form::label('email', 'Email')}}
	    	{{Form::email('email', $user->email, ['class'=>'form-control'])}}
	    </div>
	    <div class="form-group">
	    	{{Form::label('password', 'Password')}}
	    	{{Form::text('password', '', ['class'=>'form-control'])}}
	    </div>
	    <div>
	    	{{Form::submit('Submit', ['class'=>'btn btn-success btn-lg btn-block'])}}
	    </div>
	{!! Form::close() !!}
	</div>
</div>
@endsection
@section('sidebar')
	@parent
	<p>Ini tambahannya nih</p>
@endsection