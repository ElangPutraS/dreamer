<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonaturController extends Controller
{
    public function login(Request $request){
        $donaturs = donatur::all();

        $usr = $request->input('username');
        $pass = $request->input('pass');

        foreach($donaturs as $p){
            if ($usr == $p->username && $pass == $p->pass ){
                return "berhasil eaa";
            }
        }
        return redirect()->back()->with('alert', 'Username and Password didn\'t match');
    }
	public function index(){
		$donaturs = donatur::all();

		return view('donaturs.index', compact('donaturs'));
	}
    public function create(){
        return view('form');
    }
	public function show($id){
		$donaturs = donatur::find($id);

		return view('donaturs.show', compact('donaturs'));
	}
    public function edit($id){
        $donaturs = donatur::find($id);

        return view('donaturs.edit', compact('donaturs'));
    }
	public function destroy($id){
		donatur::find($id)->delete();

		return redirect()->route('daftar.index')
                        ->with('success','Item deleted successfully');
	}
    public function store(Request $request){
    	$this->validate($request, [
    		'username'=>'required',
    		'akun'=>'required',
            'profile'=>'sometimes|image',
    		'jk'=>'required',
    		'notp'=>'required',
    		'nama'=>'required',
    		'email'=>'required',
    		'alamat'=>'required',
    		'pass'=>'required',
    		'repass'=>'required'
    	]);

    	$donatur = new donatur;
    	$donatur->username = $request->input('username');
    	$donatur->akun = $request->input('akun');
    	$donatur->jk = $request->input('jk');
    	$donatur->notp = $request->input('notp');
    	$donatur->nama = $request->input('nama');
    	$donatur->email = $request->input('email');
    	$donatur->alamat = $request->input('alamat');
    	$donatur->pass = $request->input('pass');

        if ($request->hasFile('profile')) {
            $image = $request->file('profile');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('profiles/'.$filename);
            Image::make($image)->resize(800,400)->save($location);

            $donatur->profile = $filename;
        }

    	$donatur->save();

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

    	$donatur = donatur::find($id);
    	$donatur->username = $request->input('username');
    	$donatur->akun = $request->input('akun');
    	$donatur->jk = $request->input('jk');
    	$donatur->notp = $request->input('notp');
    	$donatur->nama = $request->input('nama');
    	$donatur->email = $request->input('email');
    	$donatur->alamat = $request->input('alamat');
    	$donatur->pass = $request->input('pass');

    	$donatur->save();

    	return redirect('/');
    }
}
