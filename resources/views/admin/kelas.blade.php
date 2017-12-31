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
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Workshop Class</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.storeClass') }} " enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('kategori') ? ' has-error' : '' }} form-group{{ $errors->has('kuota') ? ' has-error' : '' }}">
                            <div class="col-md-5">
                                <label for="kategori">Kategori Workshop</label>
                                <br>
                                <select id="kategori" name="kategori" required autofocus>
                                  <option value="Android">Android</option>
                                  <option value="Website">Website</option>
                                  <option value="Desktop">Desktop</option>
                                </select>
                                @if ($errors->has('kategori'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kategori') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-5">
                                <label for="kuota">Kuota Kelas</label>
                                <br>
                                <input id="kuota" type="number" class="form-control" name="kuota" required autofocus>

                                @if ($errors->has('kuota'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kuota') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama_kelas') ? ' has-error' : '' }}">
                            <div class="col-md-10">
                                <label for="nama_kelas">Nama Kelas</label>
                                <br>
                                <input id="nama_kelas" type="text" class="form-control" name="nama_kelas" value="{{ old('nama_kelas') }}" required autofocus>

                                @if ($errors->has('nama_kelas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_kelas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mulai') ? ' has-error' : '' }} form-group{{ $errors->has('selesai') ? ' has-error' : '' }}">
                            <div class="col-md-5">
                                <label for="mulai">Tanggal Mulai</label>
                                <br>
                                <input id="mulai" type="date" name="mulai" class="form-control" required autofocus>
                                
                                @if ($errors->has('mulai'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mulai') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-5">
                                <label for="selesai">Tanggal Selesai</label>
                                <br>
                                <input id="selesai" type="date" class="form-control" name="selesai" required autofocus>

                                @if ($errors->has('selesai'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('selesai') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dana_dibutuhkan') ? ' has-error' : '' }} form-group{{ $errors->has('uang_registrasi') ? ' has-error' : '' }}">
                            <div class="col-md-5">
                                <label for="dana_dibutuhkan">Dana Dibutuhkan</label>
                                <br>
                                <input id="dana_dibutuhkan" type="number" class="form-control" name="dana_dibutuhkan" required autofocus>
                                
                                @if ($errors->has('dana_dibutuhkan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dana_dibutuhkan') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-5">
                                <label for="uang_registrasi">Uang Registrasi</label>
                                <br>
                                <input id="uang_registrasi" type="number" class="form-control" name="uang_registrasi" required autofocus>

                                @if ($errors->has('uang_registrasi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('uang_registrasi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                            <div class="col-md-10">
                                <label for="deskripsi">Deskripsi Workshop</label>
                                <br>
                                <textarea rows="4" id="deskripsi" class="form-control" name="deskripsi" value="{{ old('deskripsi') }}" required autofocus></textarea>

                                @if ($errors->has('deskripsi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tes_peserta') ? ' has-error' : '' }} form-group{{ $errors->has('tes_pemateri') ? ' has-error' : '' }}">
                            <div class="col-md-5">
                                <label for="tes_peserta">Tes Masuk Peserta</label>
                                <br>
                                <input id="tes_peserta" type="file" name="tes_peserta" required autofocus>

                                @if ($errors->has('tes_peserta'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tes_peserta') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-5">
                                <label for="tes_pemateri">Profil</label>
                                <br>
                                <input id="tes_pemateri" type="file" name="tes_pemateri" required autofocus>

                                @if ($errors->has('tes_pemateri'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tes_pemateri') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-success btn-block">
                                    + Add Class
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection