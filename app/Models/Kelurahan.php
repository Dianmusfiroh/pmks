<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'kelurahan',
        'id_kecamatan',
    ];

    protected $table = 't_kelurahan';
    protected $keyType = 'string';
    public $timestamps = false;
    public function Kecamatan() {
        return $this->hasMany(Kecamatan::class,'id', 'id_kecamatan');
    }
}
