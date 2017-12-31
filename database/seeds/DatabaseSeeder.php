<?php

use Illuminate\Database\Seeder;
use App\User;
use App\peserta;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('pesertas')->delete();
	    peserta::create(array(
	        'nama'     => 'Master',
	        'akun'     => '-',
	        'profile'     => '-',
	        'jk'     => '-',
	        'notp'     => '-',
	        'alamat'     => '-',
	        'username' => 'Master',
	        'email'    => 'el_ps@yahoo.com',
	        'pass' => 'dreamer',
	    ));
    }
}
