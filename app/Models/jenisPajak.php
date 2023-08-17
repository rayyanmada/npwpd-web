<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenisPajak extends Model
{
    use HasFactory;
    protected $table = 'jenis_pajak';
    protected $primaryKey = 'id_jenis_pajak';
    public $incrementing = false;
    protected $keyType = 'string';
}
