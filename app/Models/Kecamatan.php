<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_kecamatan',
        'nama_camat',
        'nip',

    ];

    protected $table = 't_kecamatan';
    public $timestamps = false;

}
