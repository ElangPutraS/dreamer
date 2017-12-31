<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\kelas;
use App\partisipan;
use App\User;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelass = kelas::all();
        $partisipans = partisipan::all();

        return view('admin.home', compact('kelass','partisipans'));
    }

    public function show_class($id){
        $kelass = kelas::find($id);

        return view('kelas.show', compact('kelass'));
    }

    public function show_partisipan($id){
        $partisipans = partisipan::find($id);
        $kelass = DB::table('kelas')->where('id', $partisipans->id_kelas)->first(); 
        $pesertas = DB::table('users')->where('id', $partisipans->id_peserta)->first(); 
        return view('pesertas.show', compact('kelass','partisipans','pesertas'));
    }

    public function create_class(){
        return view('admin.kelas');
    }

    public function download_file_peserta($id){
        $file = partisipan::find($id);
        $pathToFile = public_path('hasilTesPeserta/'.$file->file_tes);

        return response()->download($pathToFile);
    }

    public function download_bukti_peserta($id){
        $file = partisipan::find($id);
        $pathToFile = public_path('buktiPeserta/'.$file->file_bukti);

        return response()->download($pathToFile);
    }

    public function destroy_partisipan($id){
        if(!is_null(partisipan::find($id)->file_tes))
            File::delete(public_path('hasilTesPeserta/'.partisipan::find($id)->file_tes));
        if(!is_null(partisipan::find($id)->file_bukti))
            File::delete(public_path('buktiPeserta/'.partisipan::find($id)->file_bukti));
        partisipan::find($id)->delete();
        $kelass = kelas::all();
        $partisipans = partisipan::all();
        return view('admin.home', compact('kelass','partisipans'))->with('success','Class has been deleted');
    }

    public function destroy_class($id){
        File::delete(public_path('tesPeserta/'.kelas::find($id)->tes_peserta));
        File::delete(public_path('tesPemateri/'.kelas::find($id)->tes_pemateri));
        kelas::find($id)->delete();
        $kelass = kelas::all();
        $par = partisipan::all();
        foreach ($par as $p) {
            if ($p->id_kelas == $id) {
                if(!is_null(partisipan::find($p->id)->file_tes))
                    File::delete(public_path('hasilTesPeserta/'.partisipan::find($p->id)->file_tes));
                if(!is_null(partisipan::find($p->id)->file_bukti))
                    File::delete(public_path('buktiPeserta/'.partisipan::find($p->id)->file_bukti));
                partisipan::find($p->id)->delete();
            }
        }
        $partisipans = partisipan::all();
        return view('admin.home', compact('kelass','partisipans'))->with('success','Class has been deleted');
    }

    public function store_class(Request $request){
        $this->validate($request, [
            'mulai'=>'required',
            'selesai'=>'required',
            'dana_dibutuhkan'=>'required',
            'uang_registrasi'=>'required',
            'kuota'=>'required',
            'nama_kelas'=>'required',
            'kategori'=>'required',
            'deskripsi'=>'required',
            'tes_peserta'=>'required|max:10000|mimes:doc,docx,jpeg,png,jpg',
            'tes_pemateri'=>'required|max:10000|mimes:doc,docx,jpeg,png,jpg'
        ]);

        $kelas = new kelas;
        $kelas->mulai = $request->input('mulai');
        $kelas->selesai = $request->input('selesai');
        $kelas->dana_terkumpul = 0;
        $kelas->dana_dibutuhkan = $request->input('dana_dibutuhkan');
        $kelas->uang_registrasi = $request->input('uang_registrasi');
        $kelas->kuota = $request->input('kuota');
        $kelas->nama_kelas = $request->input('nama_kelas');
        $kelas->kategori = $request->input('kategori');
        $kelas->deskripsi = $request->input('deskripsi');

        if ($request->hasFile('tes_peserta')) {
            $file = $request->file('tes_peserta');
            $image = $request->file('tes_peserta');
            $filename = time() . 'peserta.' . $image->getClientOriginalExtension();
            $location = public_path('tesPeserta/');
            $file->move($location, $filename);

            $kelas->tes_peserta = $filename;
        }
        if ($request->hasFile('tes_pemateri')) {
            $file = $request->file('tes_pemateri');
            $image = $request->file('tes_pemateri');
            $filename = time() . 'pemateri.' . $image->getClientOriginalExtension();
            $location = public_path('tesPemateri/');
            $file->move($location, $filename);

            $kelas->tes_pemateri = $filename;
        }

        $kelas->save();

        return redirect('/admin');
    }

    public function edit_class($id){
        $kelass = kelas::find($id);

        return view('kelas.edit', compact('kelass'));
    }

    public function update_class(Request $request,$id){
        $this->validate($request, [
            'mulai'=>'required',
            'selesai'=>'required',
            'dana_dibutuhkan'=>'required',
            'uang_registrasi'=>'required',
            'kuota'=>'required',
            'nama_kelas'=>'required',
            'kategori'=>'required',
            'deskripsi'=>'required'
        ]);

        $kelas = kelas::find($id);
        $kelas->mulai = $request->input('mulai');
        $kelas->selesai = $request->input('selesai');
        $kelas->dana_dibutuhkan = $request->input('dana_dibutuhkan');
        $kelas->uang_registrasi = $request->input('uang_registrasi');
        $kelas->kuota = $request->input('kuota');
        $kelas->nama_kelas = $request->input('nama_kelas');
        $kelas->kategori = $request->input('kategori');
        $kelas->deskripsi = $request->input('deskripsi');
        if(!is_null($request->input('tes_peserta'))){
            $kelas->tes_peserta = $request->input('tes_peserta');
        }
        if(!is_null($request->input('tes_pemateri'))){
            $kelas->tes_pemateri = $request->input('tes_pemateri');
        }
        // if ($request->hasFile('profile')) {
        //     $image = $request->file('profile');
        //     $filename = time() . '.' . $image->getClientOriginalExtension();
        //     $location = public_path('img/'.$filename);
        //     Image::make($image)->resize(800,400)->save($location);

        //     $peserta->profile = $filename;
        // }

        $kelas->save();

        return redirect('/admin');
    }

    public function validasi_pengerjaan(Request $request,$id){
        DB::table('partisipans')->where('id', $id)
            ->update([
                'status' => "Lolos Tes"
            ]);

        return redirect('/admin');
    }

    public function validasi_pembayaran(Request $request,$id){
        DB::table('partisipans')->where('id', $id)
            ->update([
                'status' => "Sudah Diverifikasi",
                'pembayaran' => "Y"
            ]);

        return redirect('/admin');
    }
}
