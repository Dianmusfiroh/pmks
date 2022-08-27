<?php

namespace App\Http\Controllers;

use App\Models\Pmks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuessController extends Controller
{
    public function statik()
    {
        $anakTelantar = Pmks::where('jenis_pmks','Anak Terlantar')->count('id');
        $AnakBalitaTerlantar = Pmks::where('jenis_pmks','Anak Balita Terlantar')->count('id');
        $AnakBerhadapanDenganHukum = Pmks::where('jenis_pmks','Anak Berhadapan Dengan Hukum')->count('id');
        $AnakJalanan = Pmks::where('jenis_pmks','Anak Jalanan')->count('id');
        $AnakDenganDisabilitas = Pmks::where('jenis_pmks','Anak Dengan Disabilitas')->count('id');
        $AnakYangMenjadiKorbanTindakKekerasan = Pmks::where('jenis_pmks','Anak Yang Menjadi Korban Tindak Kekerasan')->count('id');
        $AnakYangMemerlukanPerlindunganKhusus = Pmks::where('jenis_pmks','Anak Yang Memerlukan Perlindungan Khusus')->count('id');
        $LanjutUsiaTerlantar = Pmks::where('jenis_pmks','Lanjut Usia Terlantar')->count('id');
        $PenyandangCacatDisabilitas = Pmks::where('jenis_pmks','Penyandang Cacat Disabilitas')->count('id');
        $TunaSusila = Pmks::where('jenis_pmks','Tuna Susila')->count('id');
        $Gelandangan = Pmks::where('jenis_pmks','Gelandangan')->count('id');
        $Pengemis = Pmks::where('jenis_pmks','Pengemis')->count('id');
        $Pemulung = Pmks::where('jenis_pmks','Pemulung')->count('id');
        $KelompokMinoritas = Pmks::where('jenis_pmks','Kelompok Minoritas')->count('id');
        $BekasWargaBinaanPemasyarakatan = Pmks::where('jenis_pmks','Bekas Warga Binaan Pemasyarakatan')->count('id');
        $OrangDenganHIV = Pmks::where('jenis_pmks','Orang Dengan HIV/AIDS')->count('id');
        $KorbanPenyahgunaanNapza = Pmks::where('jenis_pmks','Korban Penyahgunaan Napza')->count('id');
        $KorbanTrffking = Pmks::where('jenis_pmks','Korban Trffking')->count('id');
        $KorbanTindakKekerasan = Pmks::where('jenis_pmks','Korban Tindak Kekerasan')->count('id');
        $PekerjaMigranBermasalahSosial = Pmks::where('jenis_pmks','Pekerja Migran Bermasalah Sosial')->count('id');
        $KorbanBencanaAlam = Pmks::where('jenis_pmks','Korban Bencana Alam')->count('id');
        $KorbanBencanaSosial = Pmks::where('jenis_pmks','Korban Bencana Sosial')->count('id');
        $PerempuanRawanSosialEkonomi = Pmks::where('jenis_pmks','Perempuan Rawan Sosial Ekonomi')->count('id');
        $FakirMiskin = Pmks::where('jenis_pmks','Fakir Miskin')->count('id');
        $KeluargaBemasalahSosialPsikologis = Pmks::where('jenis_pmks','Keluarga Bemasalah Sosial Psikologis')->count('id');
        $KomunitasAdatTerpencil = Pmks::where('jenis_pmks','Komunitas Adat Terpencil')->count('id');
        return view('layouts.static',compact(
            'anakTelantar',
        'AnakBalitaTerlantar','AnakBerhadapanDenganHukum',
            'AnakJalanan',
            'AnakDenganDisabilitas',
            'AnakYangMenjadiKorbanTindakKekerasan',
            'AnakYangMemerlukanPerlindunganKhusus',
            'LanjutUsiaTerlantar',
            'PenyandangCacatDisabilitas',
            'TunaSusila',
            'Gelandangan',
            'Pengemis',
            'Pemulung',
            'KelompokMinoritas',
            'BekasWargaBinaanPemasyarakatan',
            'OrangDenganHIV',
            'KorbanPenyahgunaanNapza',
            'KorbanTrffking',
            'KorbanTindakKekerasan',
            'PekerjaMigranBermasalahSosial',
            'KorbanBencanaAlam',
            'KorbanBencanaSosial',
            'PerempuanRawanSosialEkonomi',
            'FakirMiskin',
            'KeluargaBemasalahSosialPsikologis',
            'KomunitasAdatTerpencil'
    ));
    }
    public function cekBansos()
    {
        return view('layouts.cekBansos');
    }
}
