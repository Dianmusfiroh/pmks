<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PmksController extends Controller
{
    public function __construct(){
        $this->modul = 'pmks';

    }
    public function index()
    {
        $modul = $this->modul;
        return view('pmks.index',compact('modul'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('pmks.add',compact('modul'));

    }
}
