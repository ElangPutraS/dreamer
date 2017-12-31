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
        {{ Form::open(['route' => ['admin.deleteClass', $kelass->id], 'method' => 'delete']) }}
       <div class="jumbotron text-center" style="background-image: url('/img/8.jpg');color: white;background-size: 345 456">
            <div class="container">
                <h1>{{$kelass->nama_kelas}}</h1>
                <p class="lead">
                    <strong>
                        ~Kategori : {{$kelass->kategori}}~
                        <br>
                        Kuota : {{$kelass->kuota}}
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
                        <label>Detail Kelas : </label><br>
                        {!! nl2br(e($kelass->deskripsi)) !!}
                    </div>
                </div>
            </div>  
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if(Request::is('admin/show_class/'.$kelass->id))
                        <button type="submit" class="btn btn-danger btn-block">Delete</button>
                        <br>
                        <a href="{{route('admin.editClass', $kelass->id)}}" class="btn btn-primary btn-block">Edit</a>
                    @elseif(Request::is('Homepage/show_class/'.$kelass->id))
                        <a href="{{route('User.daftar', ['id'=>Auth::user()->id, 'kelas'=>$kelass->id])}}" class="btn btn-primary btn-block">Join</a>
                    @endif
                    <div class="panel-body">
                        <table>
                            <tr>
                                <td>
                                    <label>Dana Dibutuhkan </label>
                                </td>
                                <td><label> : </label></td>
                                <td>
                                    <p> Rp {{$kelass->dana_dibutuhkan}},00</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Dana Terkumpul </label>
                                </td>
                                <td><label> : </label></td>
                                <td>
                                    <p> Rp {{$kelass->dana_terkumpul}},00</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Uang Registrasi </label>
                                </td>
                                <td><label> : </label></td>
                                <td>
                                    <p> Rp {{$kelass->uang_registrasi}},00</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection