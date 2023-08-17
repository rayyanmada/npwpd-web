<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bidangUsaha extends Model
{
    use HasFactory;
    protected $table = 'bidang_usaha';
    protected $primaryKey = 'id_bidang_usaha';
    public $incrementing = false;
    protected $keyType = 'string';
}
