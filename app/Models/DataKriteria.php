<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKriteria extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'kode_kriteria',
        'nama_kriteria',
        'value',
        'jenis',
    ];

    protected $table = 't_data_kriteria';
    public $timestamps = false;

}
