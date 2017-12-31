<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\kelas;
use App\partisipan;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelass = kelas::all();
        return view('home', compact('kelass'));
    }
    public function edit($id){
        $user = User::find($id);

        return view('pesertas.edit', compact('user'));
    }
    public function daftar_kelas($user, $kelas){
        $us = User::find($user);
        $kelass = kelas::find($kelas);
        $partisipans = partisipan::all();
        $p = "Ea";  
        foreach ($partisipans as $par){
            if($par->id_kelas==$kelas && $par->id_peserta==$user){
                $p = partisipan::find($par->id);
            }
        }
        return view('kelas.daftar', compact('kelass','p'));
    }
    public function homepage()
    {
        $kelass = kelas::all();
        return view('user.home', compact('kelass'));
    }
    public function show_class($id){
        $kelass = kelas::find($id);

        return view('kelas.show', compact('kelass'));
    }

    public function download_tes_peserta($id){
        $file = kelas::find($id);
        $pathToFile = public_path('tesPeserta/'.$file->tes_peserta);

        return response()->download($pathToFile);
    }

    public function store_partisipan(Request $request,$id,$kelas){
        $this->validate($request, [
            'file_tes'=>'required|max:10000|mimes:doc,docx,jpeg,png,jpg'
        ]);

        $partisipan = new partisipan;
        $partisipan->id_kelas = $kelas;
        $partisipan->id_peserta = $id;
        $partisipan->status = "Belum Diperiksa";
        $partisipan->pembayaran = "N";
        $partisipan->sertifikat = User::find($id)->name;

        if ($request->hasFile('file_tes')) {
            $file = $request->file('file_tes');
            $image = $request->file('file_tes');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('hasilTesPeserta/');
            $file->move($location, $filename);

            $partisipan->file_tes = $filename;
        }

        $partisipan->save();

        return redirect('/Homepage');
    }

    public function store_partisipan_pembayaran(Request $request,$id,$kelas){
        $this->validate($request, [
            'file_bukti'=>'required|max:10000|mimes:doc,docx,jpeg,png,jpg'
        ]);
        $par = partisipan::all();
        $tmp = 0;
        foreach ($par as $key => $p) {
            if($p->id_kelas == $kelas && $p->id_peserta == $id)
                $tmp = $p->id;
        }
        $user = User::find($id);
        if ($request->hasFile('file_bukti')) {
            $file = $request->file('file_bukti');
            $image = $request->file('file_bukti');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            if($user->akun == "Pemateri")
                $location = public_path('CVpemateri/');
            elseif($user->akun == "Peserta")
                $location = public_path('buktiPeserta/');
            $file->move($location, $filename);

            DB::table('partisipans')->where('id', $tmp)
                ->update([
                    'file_bukti' => $filename,
                    'status' => "Belum Diverifikasi"
                ]);
        }

        return redirect('/Homepage');
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'username'=>'required',
            'akun'=>'required',
            'jk'=>'required',
            'notp'=>'required',
            'name'=>'required',
            'email'=>'required',
            'alamat'=>'required',
        ]);

        $peserta = User::find($id);
        $peserta->username = $request->input('username');
        $peserta->akun = $request->input('akun');
        $peserta->jk = $request->input('jk');
        $peserta->notp = $request->input('notp');
        $peserta->name = $request->input('name');
        $peserta->email = $request->input('email');
        $peserta->alamat = $request->input('alamat');
        if(!is_null($request->input('password'))){
            $peserta->password = $request->input('password');
        }

        $peserta->save();

        return $this->homepage();
    }
}
