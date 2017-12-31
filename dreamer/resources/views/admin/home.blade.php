@extends ('layouts.appUser')

@section('username')
	
	Master
@endsection

@section('akun')
	Admin
@endsection

@section('ide')
	{{ Auth::user()->id }}
@endsection

@section('nama')
	{{ Auth::user()->name }}
@endsection

@section('content')
	@section('a')
		{{route('admin.createClass')}}
	@endsection
	@section('first')
		<h2>Workshop Class</h2>
		<p>Manage workshop class, participant, score, worksheet, and allocation of each class.</p>
	@endsection
	@section('b')
		{{route('admin.createClass')}}
	@endsection
	@section('second')
		<h2>User</h2>
		<p>Manage every user, see the profile, edit or remove from dreamer website.</p>
	@endsection
	@section('third')
		<h2>Validate Registrant</h2>
		<p>Validate every registrant that have registered to a workshop class</p>
	@endsection
	@include('inc.marketing')
	<div class="row">

		<div class="navbar navbar-inverse">
			<h1 class="text-center" style="color: white;"><strong>List of Workshop Class</strong></h1>
		</div>
		@foreach($kelass as $k)
		<div class="col-md-3">
		<div class="panel panel-default" >
				<div class="panel-heading" style="background-color: gray;color: white;"><strong><p class="text-center">{{$k->nama_kelas}}<br>Kategori : {{$k->kategori}}</p></strong></div>
				<div class="panel-body">
					<strong>Biaya Reg : </strong>{{$k->uang_registrasi}}<br><br>
					<strong>Deskripsi : </strong>{{str_limit($k->deskripsi, 50, '...')}}<br><br>
				
					<a href="{{route('admin.showClass',$k->id)}}" class="btn btn-success btn-block">View</a><br>
					<a href="{{route('admin.editClass', $k->id)}}" class="btn btn-primary btn-block">Edit</a>
				</div>
				
					
		</div>
		</div>
		@endforeach
	</div>
	<div class="row">

		<div class="navbar navbar-inverse">
			<h1 class="text-center" style="color: white;"><strong>List of Student</strong></h1>
		</div>
		
		<div class="col-md-12">
		<div class="panel panel-default" >
				<div class="panel-heading" style="background-color: gray;color: white;"><strong><p class="text-center">Accept Student</p></strong></div>
				
				<div class="panel-body">
					<table class="table">
						<tr>
							<th>ID Peserta</th>
							<th>Nama Partisipan</th>
							<th>Nama Kelas</th>
							<th>Status</th>
							<th>Pembayaran</th>
							<th></th>
							<th></th>
						</tr>
						@foreach($partisipans as $p)
							@if($p->status == "Sudah Diverifikasi")
								<tr>
									<th>{{$p->id_peserta}}</th>
									<th>{{$p->sertifikat}}</th>
									<th>
										@foreach($kelass as $k)
											@if($k->id == $p->id_kelas)
												{{$k->nama_kelas}}
											@endif
										@endforeach
									</th>
									<th>{{$p->status}}</th>
									<th>
										@if($p->pembayaran == "Y")
											Sudah
										@else
											Belum
										@endif
									</th>
									<th><a href="{{route('admin.showPartisipan', $p->id)}}" class="btn btn-success btn-block">View</a><br></th>
									<th>
										{{ Form::open(['route' => ['admin.deletePartisipan', $p->id], 'method' => 'delete']) }}
										<button type="submit" class="btn btn-danger btn-block">Delete</button>
										{{ Form::close() }}
									</th>
								</tr>
							@endif
						@endforeach	
					</table>
				</div>
					
		</div>
		</div>

		<div class="col-md-12">
		<div class="panel panel-default" >
				<div class="panel-heading" style="background-color: gray;color: white;"><strong><p class="text-center">Validate Payment</p></strong></div>
				
				<div class="panel-body">
					<table class="table">
						<tr>
							<th>ID Peserta</th>
							<th>Nama Partisipan</th>
							<th>Nama Kelas</th>
							<th>Status</th>
							<th>Pembayaran</th>
							<th></th>
							<th></th>
						</tr>
						@foreach($partisipans as $p)
							@if($p->status == "Belum Diverifikasi")
								<tr>
									<th>{{$p->id_peserta}}</th>
									<th>{{$p->sertifikat}}</th>
									<th>
										@foreach($kelass as $k)
											@if($k->id == $p->id_kelas)
												{{$k->nama_kelas}}
											@endif
										@endforeach
									</th>
									<th>{{$p->status}}</th>
									<th>
										@if($p->pembayaran == "Y")
											Sudah
										@else
											Belum
										@endif
									</th>
									<th><a href="{{route('admin.showPartisipan', $p->id)}}" class="btn btn-success btn-block">View</a><br></th>
									<th>
										{{ Form::open(['route' => ['admin.deletePartisipan', $p->id], 'method' => 'delete']) }}
										<button type="submit" class="btn btn-danger btn-block">Delete</button>
										{{ Form::close() }}
									</th>
								</tr>
							@endif
						@endforeach	
					</table>
				</div>
					
		</div>
		</div>
		
		<div class="col-md-12">
		<div class="panel panel-default" >
				<div class="panel-heading" style="background-color: gray;color: white;"><strong><p class="text-center">Validate Test</p></strong></div>
				
				<div class="panel-body">
					<table class="table">
						<tr>
							<th>ID Peserta</th>
							<th>Nama Partisipan</th>
							<th>Nama Kelas</th>
							<th>Status</th>
							<th>Pembayaran</th>
							<th></th>
							<th></th>
						</tr>
						@foreach($partisipans as $p)
							@if($p->status == "Belum Diperiksa")
								<tr>
									<th>{{$p->id_peserta}}</th>
									<th>{{$p->sertifikat}}</th>
									<th>
										@foreach($kelass as $k)
											@if($k->id == $p->id_kelas)
												{{$k->nama_kelas}}
											@endif
										@endforeach
									</th>
									<th>{{$p->status}}</th>
									<th>
										@if($p->pembayaran == "Y")
											Sudah
										@else
											Belum
										@endif
									</th>
									<th><a href="{{route('admin.showPartisipan', $p->id)}}" class="btn btn-success btn-block">View</a><br></th>
									<th>
										{{ Form::open(['route' => ['admin.deletePartisipan', $p->id], 'method' => 'delete']) }}
										<button type="submit" class="btn btn-danger btn-block">Delete</button>
										{{ Form::close() }}
									</th>
								</tr>
							@endif
						@endforeach	
					</table>
				</div>
					
		</div>
		</div>
	</div>
@endsection
