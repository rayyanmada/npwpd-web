<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class objekPajak extends Model
{
    use HasFactory;
    protected $table = 'objek_pajak';
    protected $fillable = ['jenis_pajak', 'bidang_usaha', 'nomor', 'nama', 'alamat', 'rt', 'rw', 'kecamatan', 'kelurahan', 'no_telp', 'no_hp', 'kode_pos', 'nama_pj', 'alamat_pj', 'ktp', 'surat_milik_usaha'];
}
