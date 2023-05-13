<?php

namespace App\Models;

use App\Http\Controllers\KelurahanController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pmks extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama',
        'no_kk',
        'nik',
        'tgl_lahir',
        'alamat',
        'id_kelurahan',
        'id_kecamatan',
        'jenis_kelamin',
        'id_dtks',
        'status',
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
        'created_at'

    ];

    protected $table = 't_pmks';
    public $timestamps = false;
    public function JenisPmks() {
        return $this->hasMany(JenisPmks::class,'id', 'id_jenis_pmks');
    }
    public function Penilaian() {
        return $this->belongsTo(Penilaian::class,'id_pmks', 'id');
    }
    public function JenisDisabilitas() {
        return $this->hasMany(JenisDisabilitas::class,'id', 'id_jenis_disabilitas');
    }
    public function SpesificKecacatan() {
        return $this->hasMany(SpesificKecacatan::class,'id', 'id_spesific_cacat');
    }
    public function StatusRumah() {
        return $this->hasMany(StpStatusRumah::class,'id', 'id_status_rumah');
    }
    public function StatusKeberadaan() {
        return $this->hasMany(StpStatusKeberadaanKel::class,'id', 'id_status_keberadaan_keluarga');
    }
    public function AdlMakan() {
        return $this->hasMany(AdlMakan::class,'id', 'id_adl_makan');
    }
    public function AdlMandi() {
        return $this->hasMany(AdlMandi::class,'id', 'id_adl_mandi');
    }
    public function AdlPerawatan() {
        return $this->hasMany(AdlPerawatanDiri::class,'id', 'id_adl_perawatan');
    }
    public function AdlPakaian() {
        return $this->hasMany(AdlPakaian::class,'id', 'id_adl_pakaian');
    }
    public function AdlBab() {
        return $this->hasMany(AdlBab::class,'id', 'id_adl_bab');
    }
    public function KetStatusRumah() {
        return $this->hasMany(StpKetStatusRumah::class,'id', 'id_ket_status_rumah');
    }
    public function AdlTransfer() {
        return $this->hasMany(AdlTransfer::class,'id', 'id_adl_transfer');
    }
    public function Kppk() {
        return $this->hasMany(Kppk::class,'id', 'id_kppk');
    }
    public function Uppk() {
        return $this->hasMany(Uppk::class,'id', 'id_uppk');
    }
    public function User() {
        return $this->hasMany(User::class,'id', 'id_user');
    }
    public function Kelurahan() {
        return $this->hasMany(Kelurahan::class, 'id','id_kelurahan');
    }
    public function Kecamatan() {
        return $this->hasMany(Kecamatan::class, 'id','id_kecamatan');
    }
}
