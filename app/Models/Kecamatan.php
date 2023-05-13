<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_kecamatan',

    ];

    protected $table = 't_kecamatan';
    public $timestamps = false;
    protected $keyType = 'string';
    public function Kelurahan() {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan','id');
    }

}
