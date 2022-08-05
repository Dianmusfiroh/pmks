<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonPenerima extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama',
        'jenis_bantuan',
        'jenis_pmks',
    ];

    protected $table = 't_calon_penerima';
    public $timestamps = false;


}
