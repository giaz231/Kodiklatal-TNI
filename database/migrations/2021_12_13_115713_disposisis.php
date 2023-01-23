<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Disposisis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisis', function (Blueprint $table) {
            $table->id();
            $table->string('id_pengirim');
            $table->string('id_tujuan');
            $table->date('tanggal');
            $table->string('no_agenda');
            $table->string('no_surat');
            $table->date('tanggal_2')->nullable();
            $table->string('terima_dari');
            $table->string('alamat_aksi')->nullable();
            $table->string('diteruskan')->nullable();
            $table->string('aksi');
            $table->string('catatan')->length(500);
            $table->string('perihal_surat')->length(500);
            $table->string('file_surat')->nullable();
            $table->string('dibaca')->nullable();
            $table->string('menggetahui')->nullable();
            $table->string('kasetum')->nullable();
            $table->string('kasubbagminu')->nullable();
            $table->string('kaur_tu')->nullable();
            $table->string('kasetum_kembali')->nullable();
            $table->string('kasubbagminu_kembali')->nullable();
            $table->string('kaur_tu_kembali')->nullable();
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
        Schema::dropIfExists('telegrams');
    }
}
