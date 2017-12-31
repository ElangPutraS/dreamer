<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Image;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/Homepage';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'profile' => 'mimes:jpeg,bmp,png,jpeg',
            'akun' => 'required',
            'username' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'notp' => 'required',
            'password' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $fileName = 'null';

        if (Input::file('profile')->isValid()) {
            $destinationPath = public_path('profiles/');
            $extension = Input::file('profile')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;

            Input::file('profile')->move($destinationPath, $fileName);
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'akun' => $data['akun'],
            'profile' => $fileName,
            'username' => $data['username'],
            'jk' => $data['jk'],
            'notp' => $data['notp'],
            'alamat' => $data['alamat'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
