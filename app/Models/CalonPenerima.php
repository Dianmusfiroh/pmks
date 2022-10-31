<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonPenerima extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_pmks',
        'id_jenis_pmks',
        'ket_jenis_pmks',
        'id_jenis_disabilitas',
        'id_spesific_cacat',
        'id_status_rumah',
        'id_status_keberadaan_keluarga',
        'id_adl_makan',
        'id_adl_mandi',
        'id_adl_perawatan',
        'id_adl_pakaian',
        'id_adl_bab',
        'id_ket_status_rumah',
        'id_adl_transfer',
        'id_kppk',
        'id_uppk',
        'ket_uppk',
        'id_user',
    ];

    protected $table = 't_calon_penerima';
    public $timestamps = false;


}
