<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wajibPajak extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'wajib_pajak';

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('alamat', 'like', '%' . $search . '%');
        });
    }

    public function objek_pajak()
    {
        return $this->hasMany(objekPajak::class);
    }

    protected $fillable = ['tanggal', 'jenis_daftar', 'bidang_usaha', 'nik_npwp', 'nama', 'alamat', 'rt', 'rw', 'kecamatan', 'kelurahan', 'kabupaten_kota', 'no_telp', 'no_hp', 'email', 'kode_pos'];
}
