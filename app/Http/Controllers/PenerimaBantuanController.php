<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenerimaBantuanController extends Controller
{
    public function __construct(){
        $this->modul = 'penerimaBantuan';

    }
    public function index()
    {
        $modul = $this->modul;
        return view('penerimaBantuan.index',compact('modul'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('penerimaBantuan.add',compact('modul'));

    }
}
