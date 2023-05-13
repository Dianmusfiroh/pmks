<?php

namespace App\Http\Controllers;

use App\Models\DataKriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Yajra\DataTables\Facades\DataTables;

class PerhitunganController extends Controller
{
    protected $modul;
    public function __construct(){
        $this->modul = 'perhitungan';

    }
    public function index()
    {
        $Penilaian = Penilaian::all();
        // dd($Penilaian[0]->pmks[0]->nama);
        return view('perhitungan.index',compact('Penilaian'));
    }
    public function dataPerhitungan()
    {
            // $data = DataAlternatif::join('t_pmks','t_pmks.id','t_alternatif.id_pmks')
            //                     ->select('t_alternatif.id AS idAlternatif','t_pmks.*')
            //                     ->get();
        $data = Penilaian::join('t_alternatif','t_alternatif.id_pmks','t_penilaian.id_pmks')
                ->join('t_pmks','t_pmks.id','t_alternatif.id_pmks')
                ->select('t_penilaian.*','t_pmks.nama')->get();
             
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('C1', function($row){
            $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_kepemilikan_rumah AND p.id = $row->id");
            return $c1[0]->nilai;
        })
        ->rawColumns(['C1'])
        ->addIndexColumn()
        ->addColumn('C2', function($row){
            $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_tanggungan AND p.id = $row->id");
            return $c1[0]->nilai;
        })
        ->rawColumns(['C2'])
        ->addIndexColumn()
        ->addColumn('C3', function($row){
            $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_pendapatan AND p.id = $row->id");
            return $c1[0]->nilai;
        })
        ->rawColumns(['C3'])
        ->addIndexColumn()
        ->addColumn('C4', function($row){
            $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_pekerjaan AND p.id = $row->id");
            return $c1[0]->nilai;
        })
        ->rawColumns(['C4'])
        ->addIndexColumn()
        ->addColumn('C5', function($row){
            $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_kondisi_rumah AND p.id = $row->id");
            return $c1[0]->nilai;
        })
        ->rawColumns(['C5'])
        ->addIndexColumn()
        ->addColumn('C6', function($row){
            $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_pendidikan AND p.id = $row->id");
            return $c1[0]->nilai;
        })
        ->rawColumns(['C6'])
        ->addIndexColumn()
        ->addColumn('C7', function($row){
            $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_penerangan AND p.id = $row->id");
            return $c1[0]->nilai;
        })
        ->rawColumns(['C7'])
        ->addIndexColumn()
        ->addColumn('C8', function($row){
            $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sun_dtks AND p.id = $row->id");
            return $c1[0]->nilai;
        })
        ->rawColumns(['C8'])
        ->make(true);
        
    }
    public function bobotKriteria()
    {
        $data = DataKriteria::limit(1)->get();
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('C1', function($row){
            $c1 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C1'");
            return $c1[0]->value;
            // return $row->kode_kriteria;

        })
        ->rawColumns(['C1'])
        ->addIndexColumn()
        ->addColumn('C2', function($row){
            $c1 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C2'");
            return $c1[0]->value;
        })
        ->rawColumns(['C2'])
        ->addIndexColumn()
        ->addColumn('C3', function($row){
            $c1 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C3'");
            return $c1[0]->value;

            // $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_pendapatan AND p.id = $row->id");
            // return $c1[0]->nilai;
        })
        ->rawColumns(['C3'])
        ->addIndexColumn()
        ->addColumn('C4', function($row){
            $c1 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C4'");
            return $c1[0]->value;

            // $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_pekerjaan AND p.id = $row->id");
            // return $c1[0]->nilai;
        })
        ->rawColumns(['C4'])
        ->addIndexColumn()
        ->addColumn('C5', function($row){
            $c1 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C5'");
            return $c1[0]->value;

            // $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_kondisi_rumah AND p.id = $row->id");
            // return $c1[0]->nilai;
        })
        ->rawColumns(['C5'])
        ->addIndexColumn()
        ->addColumn('C6', function($row){
            $c1 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C6'");
            return $c1[0]->value;

            // $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_pendidikan AND p.id = $row->id");
            // return $c1[0]->nilai;
        })
        ->rawColumns(['C6'])
        ->addIndexColumn()
        ->addColumn('C7', function($row){
            $c1 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C7'");
            return $c1[0]->value;

            // $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_penerangan AND p.id = $row->id");
            // return $c1[0]->nilai;
        })
        ->rawColumns(['C7'])
        ->addIndexColumn()
        ->addColumn('C8', function($row){
            $c1 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C8'");
            return $c1[0]->value;

            // return $c1[0]->nilai;
        })
        ->rawColumns(['C8'])
        ->make(true);
        
    }
    public function normalisasiBobotKriteria()
    {
        $data = DataKriteria::limit(1)->get();
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('C1', function($row){
            $c1 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C1'");
            $jumlah = DataKriteria::sum('value');
            return round($c1[0]->value/$jumlah,1);
            // return $row->kode_kriteria;

        })
        ->rawColumns(['C1'])
        ->addIndexColumn()
        ->addColumn('C2', function($row){
            $c1 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C2'");
            $jumlah = DataKriteria::sum('value');
            return round($c1[0]->value/$jumlah,1);
        })
        ->rawColumns(['C2'])
        ->addIndexColumn()
        ->addColumn('C3', function($row){
            $c1 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C3'");
            $jumlah = DataKriteria::sum('value');
            return round($c1[0]->value/$jumlah,1);

            // $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_pendapatan AND p.id = $row->id");
            // return $c1[0]->nilai;
        })
        ->rawColumns(['C3'])
        ->addIndexColumn()
        ->addColumn('C4', function($row){
            $c1 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C4'");
            $jumlah = DataKriteria::sum('value');
            return round($c1[0]->value/$jumlah,1);

            // $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_pekerjaan AND p.id = $row->id");
            // return $c1[0]->nilai;
        })
        ->rawColumns(['C4'])
        ->addIndexColumn()
        ->addColumn('C5', function($row){
            $c1 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C5'");
            $jumlah = DataKriteria::sum('value');
            return round($c1[0]->value/$jumlah,1);

            // $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_kondisi_rumah AND p.id = $row->id");
            // return $c1[0]->nilai;
        })
        ->rawColumns(['C5'])
        ->addIndexColumn()
        ->addColumn('C6', function($row){
            $c1 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C6'");
            $jumlah = DataKriteria::sum('value');
            return round($c1[0]->value/$jumlah,1);

            // $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_pendidikan AND p.id = $row->id");
            // return $c1[0]->nilai;
        })
        ->rawColumns(['C6'])
        ->addIndexColumn()
        ->addColumn('C7', function($row){
            $c1 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C7'");
            $jumlah = DataKriteria::sum('value');
            return round($c1[0]->value/$jumlah,1);

            // $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_penerangan AND p.id = $row->id");
            // return $c1[0]->nilai;
        })
        ->rawColumns(['C7'])
        ->addIndexColumn()
        ->addColumn('C8', function($row){
            $c1 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C8'");
            $jumlah = DataKriteria::sum('value');
            return round($c1[0]->value/$jumlah,1);

            // return $c1[0]->nilai;
        })
        ->rawColumns(['C8'])
        ->make(true);
        
    }
    public function dataUtility()
    {
        // $data = Penilaian::join('t_pmks','t_pmks.id','t_penilaian.id_pmks')
        //         ->select('t_penilaian.*','t_pmks.nama')->get();
        $data = Penilaian::join('t_alternatif','t_alternatif.id_pmks','t_penilaian.id_pmks')
        ->join('t_pmks','t_pmks.id','t_alternatif.id_pmks')
        ->select('t_penilaian.*','t_pmks.nama')->get();
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('C1', function($row){
            $c1 = DB::select("SELECT p.id_pmks, dk.kode_kriteria, sd.nilai,ROUND((sd.nilai - (SELECT MIN(sd.nilai) FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sub_kepemilikan_rumah = sd.id))/((SELECT MAX(sd.nilai)  FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sub_kepemilikan_rumah = sd.id)-(SELECT MIN(sd.nilai) FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sub_kepemilikan_rumah = sd.id))*100) AS utility FROM `t_penilaian` p, t_sub_data_kriteria sd, t_data_kriteria dk WHERE sd.id = p.id_sub_kepemilikan_rumah AND sd.id_data_kriteria = dk.id AND p.id = $row->id");
            // $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_kepemilikan_rumah AND p.id = $row->id");
            return $c1[0]->utility;
        })
        ->rawColumns(['C1'])
        ->addIndexColumn()
        ->addColumn('C2', function($row){
            $c1 = DB::select("SELECT p.id_pmks, dk.kode_kriteria, sd.nilai,ROUND((sd.nilai - (SELECT MIN(sd.nilai) FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sub_tanggungan = sd.id))/((SELECT MAX(sd.nilai)  FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sub_tanggungan = sd.id)-(SELECT MIN(sd.nilai) FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sub_tanggungan = sd.id))*100) AS utility FROM `t_penilaian` p, t_sub_data_kriteria sd, t_data_kriteria dk WHERE sd.id = p.id_sub_tanggungan AND sd.id_data_kriteria = dk.id AND p.id = $row->id");
            // return (100-$c1[0]->nilai)/(100-0)*100;
            return $c1[0]->utility;

        })
        ->rawColumns(['C2'])
        ->addIndexColumn()
        ->addColumn('C3', function($row){
            $c1 = DB::select("SELECT p.id_pmks, dk.kode_kriteria, sd.nilai,ROUND((sd.nilai - (SELECT MIN(sd.nilai) FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sub_pendapatan = sd.id))/((SELECT MAX(sd.nilai)  FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sub_pendapatan = sd.id)-(SELECT MIN(sd.nilai) FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sub_pendapatan = sd.id))*100) AS utility FROM `t_penilaian` p, t_sub_data_kriteria sd, t_data_kriteria dk WHERE sd.id = p.id_sub_pendapatan AND sd.id_data_kriteria = dk.id AND p.id = $row->id");

            // $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_pendapatan AND p.id = $row->id");
            // return (100-$c1[0]->nilai)/(100-0)*100;
            return $c1[0]->utility;

        })
        ->rawColumns(['C3'])
        ->addIndexColumn()
        ->addColumn('C4', function($row){
            $c1 = DB::select("SELECT p.id_pmks, dk.kode_kriteria, sd.nilai,ROUND((sd.nilai - (SELECT MIN(sd.nilai) FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sub_pekerjaan = sd.id))/((SELECT MAX(sd.nilai)  FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sub_pekerjaan = sd.id)-(SELECT MIN(sd.nilai) FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sub_pekerjaan = sd.id))*100) AS utility FROM `t_penilaian` p, t_sub_data_kriteria sd, t_data_kriteria dk WHERE sd.id = p.id_sub_pekerjaan AND sd.id_data_kriteria = dk.id AND p.id = $row->id");
            // $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_pekerjaan AND p.id = $row->id");
            // return (100-$c1[0]->nilai)/(100-0)*100;
            return $c1[0]->utility;

        })
        ->rawColumns(['C4'])
        ->addIndexColumn()
        ->addColumn('C5', function($row){
            $c1 = DB::select("SELECT p.id_pmks, dk.kode_kriteria, sd.nilai,ROUND((sd.nilai - (SELECT MIN(sd.nilai) FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sub_kondisi_rumah = sd.id))/((SELECT MAX(sd.nilai)  FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sub_kondisi_rumah = sd.id)-(SELECT MIN(sd.nilai) FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sub_kondisi_rumah = sd.id))*100) AS utility FROM `t_penilaian` p, t_sub_data_kriteria sd, t_data_kriteria dk WHERE sd.id = p.id_sub_kondisi_rumah AND sd.id_data_kriteria = dk.id AND p.id = $row->id");
            // $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_kondisi_rumah AND p.id = $row->id");
            // return (100-$c1[0]->nilai)/(100-0)*100;
            return $c1[0]->utility;

        })
        ->rawColumns(['C5'])
        ->addIndexColumn()
        ->addColumn('C6', function($row){
            $c1 = DB::select("SELECT p.id_pmks, dk.kode_kriteria, sd.nilai,ROUND((sd.nilai - (SELECT MIN(sd.nilai) FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sub_pendidikan = sd.id))/((SELECT MAX(sd.nilai)  FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sub_pendidikan = sd.id)-(SELECT MIN(sd.nilai) FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sub_pendidikan = sd.id))*100) AS utility FROM `t_penilaian` p, t_sub_data_kriteria sd, t_data_kriteria dk WHERE sd.id = p.id_sub_pendidikan AND sd.id_data_kriteria = dk.id AND p.id = $row->id");
            // $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_pendidikan AND p.id = $row->id");
            // return (100-$c1[0]->nilai)/(100-0)*100;
            return $c1[0]->utility;

        })
        ->rawColumns(['C6'])
        ->addIndexColumn()
        ->addColumn('C7', function($row){
            $c1 = DB::select("SELECT p.id_pmks, dk.kode_kriteria, sd.nilai,ROUND((sd.nilai - (SELECT MIN(sd.nilai) FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sub_penerangan = sd.id))/((SELECT MAX(sd.nilai)  FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sub_penerangan = sd.id)-(SELECT MIN(sd.nilai) FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sub_penerangan = sd.id))*100) AS utility FROM `t_penilaian` p, t_sub_data_kriteria sd, t_data_kriteria dk WHERE sd.id = p.id_sub_penerangan AND sd.id_data_kriteria = dk.id AND p.id = $row->id");
            // $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_penerangan AND p.id = $row->id");
            // return (100-$c1[0]->nilai)/(100-0)*100;
            return $c1[0]->utility;

        })
        ->rawColumns(['C7'])
        ->addIndexColumn()
        ->addColumn('C8', function($row){
            $c1 = DB::select("SELECT p.id_pmks, dk.kode_kriteria, sd.nilai,ROUND((sd.nilai - (SELECT MIN(sd.nilai) FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sun_dtks = sd.id))/((SELECT MAX(sd.nilai)  FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sun_dtks = sd.id)-(SELECT MIN(sd.nilai) FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE p.id_sun_dtks = sd.id))*100) AS utility FROM `t_penilaian` p, t_sub_data_kriteria sd, t_data_kriteria dk WHERE sd.id = p.id_sun_dtks AND sd.id_data_kriteria = dk.id AND p.id = $row->id");
            // $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sun_dtks AND p.id = $row->id");
            // return (100-$c1[0]->nilai)/(100-0)*100;
            return $c1[0]->utility;

        })
        ->rawColumns(['C8'])
        ->make(true);
    }
    // public function dataHasil()
    // {
    //     // $data = Penilaian::join('t_pmks','t_pmks.id','t_penilaian.id_pmks')
    //     //         ->select('t_penilaian.*','t_pmks.nama')->get();
    //     $data = Penilaian::join('t_alternatif','t_alternatif.id_pmks','t_penilaian.id_pmks')
    //     ->join('t_pmks','t_pmks.id','t_alternatif.id_pmks')
    //     ->select('t_penilaian.*','t_pmks.nama')->get();
    //     return DataTables::of($data)
    //     ->addIndexColumn()
    //     ->addColumn('hasil', function($row){
    //         $dk1 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C1'");
    //         $dk2 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C2'");
    //         $dk3 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C3'");
    //         $dk4 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C4'");
    //         $dk5 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C5'");
    //         $dk6 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C6'");
    //         $dk7 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C7'");
    //         $dk8 = DB::select("SELECT * FROM `t_data_kriteria` WHERE kode_kriteria = 'C8'");
    //         $jumlah = DataKriteria::sum('value');

    //         $dkHasil1 =  $dk1[0]->value/$jumlah;
    //         $dkHasil2 =  $dk2[0]->value/$jumlah;
    //         $dkHasil3 =  $dk3[0]->value/$jumlah;
    //         $dkHasil4 =  $dk4[0]->value/$jumlah;
    //         $dkHasil5 =  $dk5[0]->value/$jumlah;
    //         $dkHasil6 =  $dk6[0]->value/$jumlah;
    //         $dkHasil7 =  $dk7[0]->value/$jumlah;
    //         $dkHasil8 =  $dk8[0]->value/$jumlah;
            
    //         $c1 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_kepemilikan_rumah AND p.id = $row->id");
    //         $c2 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_tanggungan AND p.id = $row->id");
    //         $c3 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_pendapatan AND p.id = $row->id");
    //         $c4 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_pekerjaan AND p.id = $row->id");
    //         $c5 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_kondisi_rumah AND p.id = $row->id");
    //         $c6 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_pendidikan AND p.id = $row->id");
    //         $c7 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_penerangan AND p.id = $row->id");
    //         $c8 = DB::select("SELECT sd.nilai FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sun_dtks AND p.id = $row->id");
            
    //         $utility1 =   (100-$c1[0]->nilai)/(100-0)*100;
    //         $utility2 =   (100-$c2[0]->nilai)/(100-0)*100;
    //         $utility3 =   (100-$c3[0]->nilai)/(100-0)*100;
    //         $utility4 =   (100-$c4[0]->nilai)/(100-0)*100;
    //         $utility5 =   (100-$c5[0]->nilai)/(100-0)*100;
    //         $utility6 =   (100-$c6[0]->nilai)/(100-0)*100;
    //         $utility7 =   (100-$c7[0]->nilai)/(100-0)*100;
    //         $utility8 =   (100-$c8[0]->nilai)/(100-0)*100;
    //         // dd($dkHasil1+$dkHasil2+$dkHasil3+$dkHasil4+$dkHasil5+$dkHasil6+$dkHasil7+$dkHasil8);
    //         $hasil1 = $dkHasil1+$utility1;
    //         $hasil2 = $dkHasil2+$utility2;
    //         $hasil3 = $dkHasil3+$utility3;
    //         $hasil4 = $dkHasil4+$utility4;
    //         $hasil5 = $dkHasil5+$utility5;
    //         $hasil6 = $dkHasil6+$utility6;
    //         $hasil7 = $dkHasil7+$utility7;
    //         $hasil8 = $dkHasil8+$utility8;
    //         return $hasil1+$hasil2+$hasil3+$hasil4+$hasil5+$hasil6+$hasil7+$hasil8 ;
    //     })
    //     ->rawColumns(['hasil'])
    //     ->addIndexColumn()
    //     ->addColumn('no', function($row){
    //     $n = Penilaian::join('t_pmks','t_pmks.id','t_penilaian.id_pmks')
    //     ->select('t_penilaian.*','t_pmks.nama')->get();
    //     foreach ($n as $key => $value) {
    //         return ++$key;
    //     }
    //     // for ($i=0; $i < 3 ; $i++) { 
    //     //     return $i;
    //     //  }
    //         // return '0'  ;

    //     })
    //     ->rawColumns(['no'])
    //     ->make(true);
    // }
    public function dataHasil()
    {
        // $data = Penilaian::join('t_pmks','t_pmks.id','t_penilaian.id_pmks')
        //         ->select('t_penilaian.*','t_pmks.nama')->get();
        $data = DB::select("SELECT pn.id_pmks, p.nama,round(SUM(pn.final)) as total FROM `v_penilaian5` pn,t_pmks p WHERE pn.id_pmks =p.id GROUP BY 1 ORDER BY 3 DESC;
        ");
       
        return DataTables::of($data)
        ->addIndexColumn()
        ->make(true);
    }
    public function hasil()
    {
        return view('nilai.hasil');
    }
}
