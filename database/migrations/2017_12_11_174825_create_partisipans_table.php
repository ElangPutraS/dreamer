<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartisipansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partisipans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_kelas');
            $table->string('id_peserta');
            $table->string('status');
            $table->integer('rating')->nullable();
            $table->string('wk1')->nullable();
            $table->string('wk2')->nullable();
            $table->string('wk3')->nullable();
            $table->string('wk4')->nullable();
            $table->string('wk5')->nullable();
            $table->integer('nilai_wk1')->nullable();
            $table->integer('nilai_wk2')->nullable();
            $table->integer('nilai_wk3')->nullable();
            $table->integer('nilai_wk4')->nullable();
            $table->integer('nilai_wk5')->nullable();
            $table->string('file_tes')->nullable();
            $table->string('pembayaran');
            $table->string('file_bukti')->nullable();
            $table->string('sertifikat');
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
        Schema::dropIfExists('partisipans');
    }
}
