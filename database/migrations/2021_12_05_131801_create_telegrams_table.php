<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelegramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telegrams', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('id_unit');
            $table->tinyInteger('id_jenis_surat');
            $table->string('id_pengirim');
            $table->string('id_tujuan');
            $table->date('tanggal');
            $table->string('no_agenda');
            $table->string('no_surat');
            $table->string('perihal_surat')->length(500);
            $table->string('password')->length(500);
            $table->string('file_surat');
            $table->string('dibaca')->nullable();
            $table->string('klasifikasi')->length(500);
            $table->string('derajat')->length(500);
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
