<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWajibPajakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wajib_pajak', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('jenis_daftar', 50);
            $table->string('bidang_usaha', 50);
            $table->string('nik_npwp', 20);
            $table->string('nama', 100);
            $table->text('alamat');
            $table->char('rt', 3);
            $table->char('rw', 3);
            $table->string('kecamatan', 50);
            $table->string('kelurahan', 50);
            $table->string('kabupaten_kota', 50);
            $table->string('no_telp', 20);
            $table->string('no_hp', 20);
            $table->string('email', 100)->unique();
            $table->char('kode_pos', 5);
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
        Schema::dropIfExists('wajib_pajak');
    }
}
