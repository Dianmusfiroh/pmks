<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPmks extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'value',
    ];

    protected $table = 'JenisPmks';
    public $timestamps = false;
    public function pmks() {
        return $this->belongsTo(Pmks::class,'id_jenis_pmks', 'id');
    }

}
