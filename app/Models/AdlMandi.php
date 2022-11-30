<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdlMandi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'value',
    ];

    protected $table = 'mandiAdl';
    public $timestamps = false;
}
