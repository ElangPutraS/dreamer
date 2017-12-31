@extends ('layouts.appUser')

@section('username')
	@if(!is_null(Auth::user()->username))
        {{Auth::user()->username}}
    @else
        Master
    @endif
@endsection

@section('akun')
    @if(!is_null(Auth::user()->akun))
        {{Auth::user()->akun}}
    @else
        Admin
    @endif
@endsection

@section('ide')
	{{ Auth::user()->id }}
@endsection

@section('nama')
	{{ Auth::user()->name }}
@endsection


@section('content')
<div class="container">
    <div class="row">
        {{ Form::open(['route' => ['admin.deletePartisipan', $partisipans->id], 'method' => 'delete']) }}
       <div class="jumbotron text-center" style="background-image: url('/img/8.jpg');color: white;background-size: 345 456">
            <div class="container">
                <h1>{{$partisipans->sertifikat}}</h1>
                <p class="lead">
                    <strong>
                        ~{{$partisipans->status}}~
                    </strong>
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
             <div class="panel panel-default">
                <div class="panel-heading">
                    <label>Tanggal Mulai : </label>&nbsp;{{$kelass->mulai}}
                    {{str_repeat('&nbsp;',85)}}
                    <label>Tanggal Selesai : </label>&nbsp;{{$kelass->selesai}}
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <table>
                            <tr>
                                <td>
                                    <label>Kelas </label>
                                </td>
                                <td><label> &nbsp;:&nbsp; </label></td>
                                <td>
                                    <p> 
				                   		{{$kelass->nama_kelas}}
				                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Status Pembayaran</label>
                                </td>
                                <td><label> &nbsp;:&nbsp; </label></td>
                                <td>
                                    <p>
                                    	@if($partisipans->pembayaran == 'Y')
                                    		Sudah
                                    	@else
                                    		Belum
                                    	@endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Bukti Pengirimin</label>
                                </td>
                                <td><label> &nbsp;:&nbsp; </label></td>
                                <td>
                                    <p><a href="
                                    	@if(!is_null($partisipans->file_bukti))
                                    		{{route('admin.buktiPeserta', $partisipans->id)}}
                                    	@else
                                    		#
                                    	@endif" 
                                    	class="btn btn-primary btn-block"
                                    	@if(is_null($partisipans->file_bukti))
                                    		disabled="disabled"
                                    	@endif
                                    	>Download</a></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>File Pengerjaan</label>
                                </td>
                                <td><label> &nbsp;:&nbsp; </label></td>
                                <td>
                                    <p><a href="
                                    	@if(!is_null($partisipans->file_bukti))
                                    		{{route('admin.filePeserta', $partisipans->id)}}
                                    	@else
                                    		#
                                    	@endif"
                                    	class="btn btn-primary btn-block"
                                    	@if(is_null($partisipans->file_tes))
                                    		disabled="disabled"
                                    	@endif
                                    	>Download</a></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>  
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if(Request::is('admin/show_partisipan/'.$partisipans->id))
                        <button type="submit" class="btn btn-danger btn-block">Delete</button><br>
                        @if($partisipans->status == "Belum Diperiksa")
                        	<a href="{{route('admin.validasiPengerjaan',$partisipans->id)}}" class="btn btn-primary btn-block">Validate Test</a>
                        @elseif($partisipans->status == "Belum Diverifikasi")
                        	<a href="{{route('admin.validasiPembayaran',$partisipans->id)}}" class="btn btn-primary btn-block">Validate Payment</a>
                        @endif
                    @endif
                    <div class="panel-body">
                        <p class="text-center">
                        	<img src="{{ asset('profiles/'.$pesertas->profile) }}" style="border-radius: 50%;" width="200" height="200">
                        </p>
                        <br>
                        <p class="text-center"><strong>Rating</strong></p>
                        <p class="text-center">
                        	@if(is_null($partisipans->rating))
	                        	-Not Recorded-
	                        @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection