<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMaster extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'jenis',
    ];

    protected $table = 't_kategori_pmks';
    public $timestamps = false;
}
