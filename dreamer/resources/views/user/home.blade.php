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
	@if(Auth::user()->akun == "Perusahaan")
		EA
	@else
		<div class="row">

			<div class="navbar navbar-inverse">
				<h1 class="text-center" style="color: white;"><strong>Workshop Class</strong></h1>
			</div>
			@foreach($kelass as $k)
			<div class="col-md-3">
			<div class="panel panel-default" >
					<div class="panel-heading" style="background-color: gray;color: white;"><strong><p class="text-center">{{$k->nama_kelas}}<br>Kategori : {{$k->kategori}}</p></strong></div>
					<div class="panel-body">
						<strong>Biaya Reg : </strong>{{$k->uang_registrasi}}<br><br>
						<strong>Deskripsi : </strong>{{str_limit($k->deskripsi, 50, '...')}}<br><br>
					
						<a href="{{route('User.showClass',$k->id)}}" class="btn btn-success btn-block">View</a><br>
						<a href="{{route('User.daftar', ['id'=>Auth::user()->id, 'kelas'=>$k->id])}}" class="btn btn-primary btn-block">Join</a>
					</div>
					
						
			</div>
			</div>
			@endforeach
		</div>
	@endif
@endsection

