<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peserta extends Model
{
    protected $table = 'pesertas';

    protected $fillable = ['id','akun','profile','username','nama','jk','notp','email','alamat','pass'];
}
