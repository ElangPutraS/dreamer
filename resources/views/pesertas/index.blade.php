@extends ('layouts.app')

@section('content')
	<h1>List of User</h1>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>ID</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Email</th>
					<th></th>
					<th></th>
				</thead>
				<tbody>
					@foreach($pesertas as $p)
						<tr>
							<th>{{$p->id}}</th>
							<th>{{$p->nama}}</th>
							<th>{{$p->alamat}}</th>
							<th>{{$p->email}}</th>
							<th><a href="{{route('daftar.show',$p->id)}}" class="btn btn-default">View</a></th>
							<th><a href="{{route('daftar.edit',$p->id)}}" class="btn btn-default">Edit</a></th>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection

@section('sidebar')
	@parent
	<p>Ini tambahannya nih</p>
@endsection