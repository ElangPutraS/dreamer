<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('mulai');
            $table->date('selesai');
            $table->bigInteger('dana_terkumpul');
            $table->bigInteger('dana_dibutuhkan');
            $table->bigInteger('uang_registrasi');
            $table->integer('kuota');
            $table->string('nama_kelas');
            $table->string('kategori');
            $table->string('deskripsi');
            $table->string('wk1')->nullable();
            $table->string('wk2')->nullable();
            $table->string('wk3')->nullable();
            $table->string('wk4')->nullable();
            $table->string('wk5')->nullable();
            $table->string('tes_peserta');
            $table->string('tes_pemateri');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}
