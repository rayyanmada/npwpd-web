<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelurahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelurahan', function (Blueprint $table) {
            $table->string('id_kelurahan', 5)->primary();
            $table->string('id_kecamatan', 3);
            // $table->foreignId('id_kecamatan')->constrained('kecamatan')->onDelete('cascade')->onUpdate('cascade');
            $table->string('kelurahan');
            $table->timestamps();
        });
        Schema::table('kelurahan', function (Blueprint $table) {
            $table->foreign('id_kecamatan')->references('id_kecamatan')->on('kecamatan')->onDelete('cascade')->onUpdate('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelurahan');
    }
}
