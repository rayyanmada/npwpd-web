<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bidangUsahaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bidang_usaha')->insert([
            [
                'id_bidang_usaha' => '00101',
                'id_jenis_pajak' => '001',
                'bidang_usaha' => 'HOTEL'
            ],
            [
                'id_bidang_usaha' => '00102',
                'id_jenis_pajak' => '001',
                'bidang_usaha' => 'RESTORAN'
            ],
            [
                'id_bidang_usaha' => '00103',
                'id_jenis_pajak' => '001',
                'bidang_usaha' => 'HIBURAN'
            ],
            [
                'id_bidang_usaha' => '00104',
                'id_jenis_pajak' => '001',
                'bidang_usaha' => 'PARKIR'
            ],
            [
                'id_bidang_usaha' => '00201',
                'id_jenis_pajak' => '002',
                'bidang_usaha' => 'REKLAME'
            ],
            [
                'id_bidang_usaha' => '00202',
                'id_jenis_pajak' => '002',
                'bidang_usaha' => 'PENERANGAN JALAN'
            ],
            [
                'id_bidang_usaha' => '00203',
                'id_jenis_pajak' => '002',
                'bidang_usaha' => 'AIR TANAH'
            ],
            [
                'id_bidang_usaha' => '00301',
                'id_jenis_pajak' => '003',
                'bidang_usaha' => 'RETRIBUSI'
            ]
        ]);
    }
}
