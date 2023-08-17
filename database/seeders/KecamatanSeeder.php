<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kecamatan')->insert([
            [
                'id_kecamatan' => '001',
                'kecamatan' => 'MOJOROTO'
            ],
            [
                'id_kecamatan' => '002',
                'kecamatan' => 'KOTA'
            ],
            [
                'id_kecamatan' => '003',
                'kecamatan' => 'PESANTREN'
            ]
        ]);
    }
}
