<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function __construct(){
        $this->modul = 'kecamatan';

    }
    public function index()
    {
        $modul = $this->modul;
        return view('kecamatan.index',compact('modul'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('kecamatan.add',compact('modul'));

    }
}
