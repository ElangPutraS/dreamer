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
@if($p<>"Ea" && Auth::user()->akun == "Peserta")
	@if($p->status == "Lolos Tes")
		<div class="container">
		    <div class="row">
		        <div class="col-md-8 col-md-offset-2">
		            <div class="panel panel-default">
		                <div class="panel-heading">
		                	<strong>Registrasi Ulang</strong>
		                	<p>Uang Registrasi : Rp {{$kelass->uang_registrasi}},00</p>
		                	<p>Dapat ditransfer melalui <strong>[BNI] 123332152</strong></p>
		                </div>

		                <div class="panel-body">
		                    <form class="form-horizontal" method="POST" action="{{route('User.pembayaran', ['id'=>Auth::user()->id, 'kelas'=>$kelass->id])}} " enctype="multipart/form-data">
		                        {{ csrf_field() }}
		                        
		                        <div class="form-group{{ $errors->has('file_bukti') ? ' has-error' : '' }}">
		                            <div class="col-md-10">
		                                <label for="file_bukti">Bukti Pembayaran : </label>
		                                <br>
		                                <input id="file_bukti" type="file" name="file_bukti" required autofocus>

		                                @if ($errors->has('file_bukti'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('file_bukti') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <div class="col-md-6 col-md-offset-3" >
		                                <button type="submit" class="btn btn-success btn-block">
		                                    Submit
		                                </button>
		                            </div>
		                        </div>
		                    </form>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	@elseif($p->status == "Belum Diperiksa")
		<div class="container">
		    <div class="row">
		        <div class="col-md-8 col-md-offset-2">
		            <div class="panel panel-default">
		                <div class="panel-heading">
		                	<strong>Belum Diverifikasi</strong>
		                	<p>Mohon bersabar jawaban tes anda belum diverifikasi</p>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	@elseif($p->status == "Belum Diverifikasi")
		<div class="container">
		    <div class="row">
		        <div class="col-md-8 col-md-offset-2">
		            <div class="panel panel-default">
		                <div class="panel-heading">
		                	<strong>Belum Diverifikasi</strong>
		                	<p>Mohon bersabar pembayaran kelas anda belum diverifikasi</p>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	@endif
@elseif(Auth::user()->akun == "Pemateri")
	@if($p <> "Ea")
		<div class="container">
		    <div class="row">
		        <div class="col-md-8 col-md-offset-2">
		            <div class="panel panel-default">
		                <div class="panel-heading">
		                	<strong>Belum Diverifikasi</strong>
		                	<p>Mohon bersabar CV anda belum diverifikasi</p>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	@else
		<div class="container">
		    <div class="row">
		        <div class="col-md-8 col-md-offset-2">
		            <div class="panel panel-default">
		                <div class="panel-heading">
		                	<p class="text-center"><strong>~Upload CV anda~</strong></p>
		                	<p>Uploadlah CV anda lengkap dengan keahlian dan persyaratan pendaftaran kelas Workshop.<strong>Sertakan sertifikat jika diperlukan</strong></p>
		                </div>

		                <div class="panel-body">
		                    <form class="form-horizontal" method="POST" action="{{route('User.pembayaran', ['id'=>Auth::user()->id, 'kelas'=>$kelass->id])}} " enctype="multipart/form-data">
		                        {{ csrf_field() }}
		                        
		                        <div class="form-group{{ $errors->has('file_bukti') ? ' has-error' : '' }}">
		                            <div class="col-md-10 col">
		                                <label for="file_bukti">Upload CV : </label>
		                                <br>
		                                <input id="file_bukti" type="file" name="file_bukti" required autofocus>
		                                <strong>Note : Pastikan kembali file anda</strong>
		                                @if ($errors->has('file_bukti'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('file_bukti') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <div class="col-md-6 col-md-offset-3" >
		                                <button type="submit" class="btn btn-success btn-block">
		                                    Submit
		                                </button>
		                            </div>
		                        </div>
		                    </form>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	@endif
@else
	<div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                	<strong>Workshop Form</strong>
	                	<p>Kerjakan terlebih dahulu soal ujian masuk, yang dapat di download di bawah ini</p>
	                	<a href="{{route('User.tesPeserta', $kelass->id)}}" class="btn btn-primary btn-block">Download</a>
	                </div>

	                <div class="panel-body">
	                    <form class="form-horizontal" method="POST" action="{{route('User.daftarPartisipan', ['id'=>Auth::user()->id, 'kelas'=>$kelass->id])}} " enctype="multipart/form-data">
	                        {{ csrf_field() }}
	                        
	                        <div class="form-group{{ $errors->has('file_tes') ? ' has-error' : '' }}">
	                            <div class="col-md-10">
	                                <label for="file_tes">Jawaban Tes : </label>
	                                <br>
	                                <input id="file_tes" type="file" name="file_tes" required autofocus>

	                                @if ($errors->has('file_tes'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('file_tes') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <div class="col-md-6 col-md-offset-3" >
	                                <button type="submit" class="btn btn-success btn-block">
	                                    Submit
	                                </button>
	                            </div>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endif
@endsection

