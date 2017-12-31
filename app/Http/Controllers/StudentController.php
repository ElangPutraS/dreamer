<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\peserta;
use Image;
use DB;
use Redirect;

class StudentController extends Controller
{
    public function logout(Request $request) {
      Auth::logout();
      return redirect('/');
    }

    public function loginpage(Request $request) {
      return view('login');
    }

    public function login(Request $request){
        $pesertas = peserta::all();

        $usr = $request->input('username');
        $pass = $request->input('pass');

        if($usr == 'Master' && $pass == 'dreamer'){
            return $this->admin(1);
        }

        foreach($pesertas as $p){
            if ($usr == $p->username && $pass == $p->pass ){
                return $this->homepage($p->id);
            }
        }
        return redirect()->back()->with('alert', 'Username and Password didn\'t match');
    }
    public function admin($id){
        $pesertas = peserta::find($id);

        return view('admin.home', compact('pesertas'));
    }
    public function homepage($id){
        $pesertas = peserta::find($id);

        return view('user.home', compact('pesertas'));
    }
	public function index(){
		$pesertas = peserta::all();

		return view('pesertas.index', compact('pesertas'));
	}
    public function create(){
        return view('form');
    }
	public function show($id){
		$pesertas = peserta::find($id);

		return view('pesertas.show', compact('pesertas'));
	}
    public function edit($id){
        $pesertas = peserta::find($id);

        return view('pesertas.edit', compact('pesertas'));
    }
	public function destroy($id){
		peserta::find($id)->delete();

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

    	$peserta = new peserta;
    	$peserta->username = $request->input('username');
    	$peserta->akun = $request->input('akun');
    	$peserta->jk = $request->input('jk');
    	$peserta->notp = $request->input('notp');
    	$peserta->nama = $request->input('nama');
    	$peserta->email = $request->input('email');
    	$peserta->alamat = $request->input('alamat');
    	$peserta->pass = $request->input('pass');

        if ($request->hasFile('profile')) {
            $image = $request->file('profile');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/'.$filename);
            Image::make($image)->resize(800,400)->save($location);

            $peserta->profile = $filename;
        }

    	$peserta->save();

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

    	$peserta = peserta::find($id);
    	$peserta->username = $request->input('username');
    	$peserta->akun = $request->input('akun');
    	$peserta->jk = $request->input('jk');
    	$peserta->notp = $request->input('notp');
    	$peserta->nama = $request->input('nama');
    	$peserta->email = $request->input('email');
    	$peserta->alamat = $request->input('alamat');
    	$peserta->pass = $request->input('pass');

    	$peserta->save();

    	return redirect('/');
    }
}


