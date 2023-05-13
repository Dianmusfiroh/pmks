<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subKriteria extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_data_kriteria',
        'nama_sub',
        'nilai',
    ];

    protected $table = 't_sub_data_kriteria';
    public $timestamps = false;
}
