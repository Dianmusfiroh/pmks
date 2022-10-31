<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreHasil extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_calon_penerima',
        'total',
        'status',
    ];

    protected $table = 't_hasil_score';
    public $timestamps = false;
}
