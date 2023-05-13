<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_pmks',
        'id_sub_kepemilikan_rumah',
        'id_sub_tanggungan',
        'id_sun_dtks',
        'id_sub_pendapatan',
        'id_sub_pekerjaan',
        'id_sub_kondisi_rumah',
        'id_sub_pendidikan',
        'id_sub_penerangan',
        'created_at'
    ];

    protected $table = 't_penilaian';
    public $timestamps = false;
    public function pmks() {
        return $this->hasMany(Pmks::class,'id', 'id_pmks');
    }
}
