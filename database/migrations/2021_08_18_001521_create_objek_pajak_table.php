<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjekPajakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objek_pajak', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pajak', 50);
            $table->string('bidang_usaha', 50);
            $table->string('nomor', 20);
            $table->string('nama', 100);
            $table->text('alamat');
            $table->char('rt', 3);
            $table->char('rw', 3);
            $table->string('kecamatan', 50);
            $table->string('kelurahan', 50);
            $table->string('no_telp', 20);
            $table->string('no_hp', 20);
            $table->char('kode_pos', 5);
            $table->string('nama_pj', 100);
            $table->text('alamat_pj');
            $table->string('ktp');
            $table->string('surat_milik_usaha');
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
        Schema::dropIfExists('objek_pajak');
    }
}
