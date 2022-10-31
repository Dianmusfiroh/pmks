<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pmks extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama',
        'no_kk',
        'nik',
        'tgl_lahir',
        'alamat',
        'kelurahan',
        'kecamatan',
        'jenis_kelamin',
        'kota',
        'provinsi',
        'id_dtks',

    ];

    protected $table = 't_pmks';
    public $timestamps = false;

}
