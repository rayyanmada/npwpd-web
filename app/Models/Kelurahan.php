<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    protected $table = 'kelurahan';
    protected $primaryKey = 'id_kelurahan';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = ['id_kelurahan'];
}
