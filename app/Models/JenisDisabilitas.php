<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisDisabilitas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'value',
    ];

    protected $table = 'JenisDisabilitas';
    public $timestamps = false;
    public function pmks() {
        return $this->belongsTo(Pmks::class,'id_jenis_disabilitas', 'id');
    }
}
