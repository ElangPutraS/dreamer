<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kelas;

class KelasController extends Controller
{
    public function index(){
		$kelass = kelas::all();

		return view('class.index', compact('kelass'));
	}
    public function create(){
        return view('form');
    }
	public function show($id){
		$kelass = kelas::find($id);

		return view('class.show', compact('kelass'));
	}
    public function edit($id){
        $kelass = kelas::find($id);

        return view('class.edit', compact('kelass'));
    }
	public function destroy($id){
		kelas::find($id)->delete();

		return redirect()->route('kelas.index')
                        ->with('success','Item deleted successfully');
	}
    public function store(Request $request){
    	$this->validate($request, [
    		'mulai'=>'required',
    		'selesai'=>'required',
            'dana_terkumpul'=>'required',
    		'dana_dibutuhkan'=>'required',
    		'notp'=>'required',
    		'nama'=>'required',
    		'email'=>'required',
    		'alamat'=>'required',
    		'pass'=>'required',
    		'repass'=>'required'
    	]);

    	$kelas = new kelas;
    	$kelas->username = $request->input('username');
    	$kelas->akun = $request->input('akun');
    	$kelas->jk = $request->input('jk');
    	$kelas->notp = $request->input('notp');
    	$kelas->nama = $request->input('nama');
    	$kelas->email = $request->input('email');
    	$kelas->alamat = $request->input('alamat');
    	$kelas->pass = $request->input('pass');

        if ($request->hasFile('profile')) {
            $image = $request->file('profile');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('profiles/'.$filename);
            Image::make($image)->resize(800,400)->save($location);

            $kelas->profile = $filename;
        }

    	$kelas->save();

    	return redirect('/');
    }

    public function update(Request $request, $id){
    	$this->validate($request, [
    		'username'=>'required',
    		'akun'=>'required',
    		'jk'=>'required',
    		'notp'=>'required',
    		'nama'=>'required',
    		'email'=>'required',
    		'alamat'=>'required',
    		'pass'=>'required'
    	]);

    	$kelas = kelas::find($id);
    	$kelas->username = $request->input('username');
    	$kelas->akun = $request->input('akun');
    	$kelas->jk = $request->input('jk');
    	$kelas->notp = $request->input('notp');
    	$kelas->nama = $request->input('nama');
    	$kelas->email = $request->input('email');
    	$kelas->alamat = $request->input('alamat');
    	$kelas->pass = $request->input('pass');

    	$kelas->save();

    	return redirect('/');
    }
}
