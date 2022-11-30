<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uppk extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'value',
    ];

    protected $table = 'usulanBantuan';
    public $timestamps = false;
}
