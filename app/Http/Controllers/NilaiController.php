<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JeroenNoten\LaravelAdminLte\View\Components\Tool\Datatable;
use Yajra\DataTables\Facades\DataTables;

class NilaiController extends Controller
{
    protected $title;
    public function __construct(){
        // $this->title = 'laporan PMKS';

    }
    public function utility()
    {
        $data = DB::table('t_data_kriteria')->get();
        return view('nilai.utility',compact('data'));
    }

    public function hasil()
    {
        $data = DB::table('t_score')->join('t_data_kriteria','t_data_kriteria.id','=','t_score.id_data_kriteria')->get();
        return view('nilai.hasil');
    }
    public function getHasil()
    {
        $data = DB::table('t_score')->join('t_data_kriteria','t_data_kriteria.id','=','t_score.id_data_kriteria')->get();
        // return view('nilai.hasil',compact('data'));
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('normalisasi', function($row){
                $normal = DB::select("SELECT score FROM `t_score` WHERE id_data_kriteria = $row->id_data_kriteria ");  
                $normal = Score::where('id_data_kriteria',$row->id_data_kriteria)->first();
                $hasil = $normal->score/100;
                return $normal->score/100;
        })
        ->rawColumns(['normalisasi'])
        ->make(true);
    }
}
