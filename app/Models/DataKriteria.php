<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKriteria extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_kriteria',
        'value',
        'alias',
    ];

    protected $table = 't_data_kriteria';
    public $timestamps = false;
}
