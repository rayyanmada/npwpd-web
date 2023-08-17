<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class jenisPajakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_pajak')->insert([
            [
                'id_jenis_pajak' => '001',
                'jenis_pajak' => 'SELF ASSESSMENT'
            ],
            [
                'id_jenis_pajak' => '002',
                'jenis_pajak' => 'OFFICIAL ASSESSMENT'
            ],
            [
                'id_jenis_pajak' => '003',
                'jenis_pajak' => 'RETRIBUSI'
            ]
        ]);
    }
}
