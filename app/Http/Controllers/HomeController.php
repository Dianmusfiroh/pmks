<?php

namespace App\Http\Controllers;

use App\Models\JenisPmks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = JenisPmks::all();
        $d = "";
        foreach ($data as  $value) {
            $d = DB::select("SELECT COUNT(*) as total FROM `t_calon_penerima` WHERE id_jenis_pmks = $value->id");
        }
        return view('home');
    }

}
