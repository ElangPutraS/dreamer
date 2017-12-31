@extends ('layouts.app')

@section('content')
	<h1>List of Class</h1>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>ID</th>
					<th>Class's Name</th>
					<th>Kuota</th>
					<th>Registration Fee</th>
					<th>Start</th>
					<th>End</th>
					<th></th>
					<th></th>
				</thead>
				<tbody>
					@foreach($kelas as $k)
						<tr>
							<th>{{$k->id}}</th>
							<th>{{$k->nama_kelas}}</th>
							<th>{{$k->kuota}}</th>
							<th>{{$k->uang_registrasi}}</th>
							<th>{{$k->mulai}}</th>
							<th>{{$k->selesai}}</th>
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