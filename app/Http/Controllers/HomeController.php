<?php

namespace App\Http\Controllers;

use App\Models\JenisPmks;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pmks;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // $data = JenisPmks::all();
        // $d = "";
        // foreach ($data as  $value) {
        //     $d = DB::select("SELECT COUNT(*) as total FROM `t_calon_penerima` WHERE id_jenis_pmks = $value->id");
        // }
        $dataPMKS = Pmks::count();
        $dataKelurahan = Kelurahan::count();
        $dataAlternatif = Pmks::where('status','sukses')->count();
        $dataUser = User::count();
        $dataKecamatan = Kecamatan::count();
        $dataPMKSFilter = Pmks::where('id_kelurahan',Auth::user()->id_kelurahan)->count();
        $id_kel = Auth::user()->id_kelurahan ;
        $dataPenerimaFilter = DB::select("SELECT pn.id_pmks, p.nama ,kec.nama_kecamatan,kel.kelurahan,SUM(pn.final) as total,RANK() OVER ( ORDER BY SUM(pn.final) DESC ) AS rangking FROM `v_penilaian5` pn,t_pmks p , t_kelurahan kel ,t_kecamatan kec WHERE pn.id_pmks =p.id AND kel.id = p.id_kelurahan and kec.id = p.id_kecamatan AND p.id_kelurahan = '$id_kel' GROUP BY 1");
        // $dataPenerimaFilter = DB::select("SELECT pn.id_pmks, p.nama,jp.name as jenisPmks,kec.nama_kecamatan,kel.kelurahan,SUM(pn.final) as total,RANK() OVER ( ORDER BY SUM(pn.final) DESC ) AS rangking FROM `v_penilaian5` pn,t_pmks p , t_kelurahan kel ,t_kecamatan kec, JenisPmks jp WHERE jp.id = p.id_jenis_pmks and pn.id_pmks =p.id AND kel.id = p.id_kelurahan and kec.id = p.id_kecamatan AND p.id_kelurahan = '$id_kel' GROUP BY 1;");
        // dd($dataPenerimaFilter->count());
        return view('home',compact('dataPenerimaFilter','dataKecamatan','dataPMKS','dataKelurahan','dataAlternatif','dataUser','dataPMKSFilter'));
    }

}
