<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    protected $title;
    public function __construct(){
        $this->modul = 'laporan';
        $this->title = 'laporan PMKS';

    }
    public function laporanPmks()
    {
        $modul = $this->modul;
        $title =$this->title;
        return view('laporan.pmks',compact('modul'));

    }
    public function laporanPenyaluran()
    {
        $modul = $this->modul;
        return view('laporan.penyaluran',compact('modul'));

    }
}
