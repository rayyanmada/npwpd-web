<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidangUsahaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidang_usaha', function (Blueprint $table) {
            $table->string('id_bidang_usaha', 5)->primary();
            $table->string('id_jenis_pajak', 3);
            // $table->foreignId('id_jenis_pajak')->constrained('jenis_pajak')->onDelete('cascade')->onUpdate('cascade');
            $table->string('bidang_usaha');
            $table->timestamps();
        });
        Schema::table('bidang_usaha', function (Blueprint $table) {
            $table->foreign('id_jenis_pajak')->references('id_jenis_pajak')->on('jenis_pajak')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bidang_usaha');
    }
}
