<?php

use Illuminate\Database\Seeder;

class PesertaTableSeeder extends Seeder
{

public function run()
{
    DB::table('pesertas')->delete();
    User::create(array(
        'nama'     => 'Master',
        'username' => 'Master',
        'email'    => 'el_ps@yahoo.com',
        'pass' => 'dreamer',
    ));
}

}