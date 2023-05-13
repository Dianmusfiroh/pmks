<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAlternatif extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_pmks',
    ];

    protected $table = 't_alternatif';
    public $timestamps = false;
}
