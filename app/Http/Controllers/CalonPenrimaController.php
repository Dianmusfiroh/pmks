<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalonPenrimaController extends Controller
{
    public function __construct(){
        $this->modul = 'calonPenerima';

    }
    public function index()
    {
        $modul = $this->modul;
        return view('calonPenerima.index',compact('modul'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('calonPenerima.add',compact('modul'));

    }
}
