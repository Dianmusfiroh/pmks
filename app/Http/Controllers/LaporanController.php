<?php

namespace App\Http\Controllers;

use App\Models\DataKriteria;
use App\Models\JenisPmks;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Penilaian;
use App\Models\Pmks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
// use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Reader\Xls\RC4;

// use Barryvdh\DomPDF\PDF;


class LaporanController extends Controller
{
    protected $title;
    protected $modul;
    public function __construct(){
        $this->modul = 'laporan';
        $this->title = 'laporan PMKS';

    }
    public function laporanPmks()
    {
        $modul = $this->modul;
        $title =$this->title;
        
        // $data = Pmks::join('t_kecamatan','t_kecamatan.id','=','t_pmks.id_kecamatan')
        //         ->join('t_kelurahan','t_kelurahan.id','=','t_pmks.id_kelurahan')
        //         ->join('JenisPmks','JenisPmks.id','=','t_pmks.id_jenis_pmks')
        //         ->select('t_pmks.*','JenisPmks.name as jenisPMKS','t_kelurahan.kelurahan','t_kecamatan.nama_kecamatan')
        //         ->where('t_pmks.status','sukses')->get();
        // dd($)
        $data = DB::select("SELECT a.*,kc.nama_kecamatan ,kl.kelurahan , m.name AS jenis_pmks FROM t_pmks a, t_kecamatan kc , t_kelurahan kl ,t_kategori_pmks m WHERE a.id_jenis_pmks = m.id AND kc.id = a.id_kecamatan AND kl.id = a.id_kelurahan");
   
        $bulan = DB::select("SELECT * FROM `t_pmks` GROUP BY month(created_at);");
        return view('laporan.pmks',compact('modul','data','bulan'));

    }
    public function LaporandataPmks()
    {
        $id_kel = Auth::user()->id_kelurahan;
        if (Auth::user()->id_kelurahan != null) {
            $data = DB::select("SELECT a.*,kc.nama_kecamatan ,kl.kelurahan , m.name AS jenisPMKS FROM t_pmks a, t_kecamatan kc , t_kelurahan kl ,t_kategori_pmks m WHERE a.id_jenis_pmks = m.id AND kc.id = a.id_kecamatan AND kl.id = a.id_kelurahan AND a.id_kelurahan = '$id_kel'");

            // $data = Pmks::join('t_kecamatan','t_kecamatan.id','=','t_pmks.id_kecamatan')
            // ->join('t_kelurahan','t_kelurahan.id','=','t_pmks.id_kelurahan')
            // ->join('JenisPmks','JenisPmks.id','=','t_pmks.id_jenis_pmks')
            // ->select('t_pmks.*','JenisPmks.name as jenisPMKS','t_kelurahan.kelurahan','t_kecamatan.nama_kecamatan')
            // ->where('t_pmks.status','sukses')
            // ->where('t_pmks.id_kelurahan',Auth::user()->id_kelurahan)->get();
        } else {
            $data = DB::select("SELECT a.*,kc.nama_kecamatan ,kl.kelurahan , m.name AS jenisPMKS FROM t_pmks a, t_kecamatan kc , t_kelurahan kl ,t_kategori_pmks m WHERE a.id_jenis_pmks = m.id AND kc.id = a.id_kecamatan AND kl.id = a.id_kelurahan");
        }
        
    

        

        return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
    }
    public function LaporandataPmksFilter(Request $request)
    {
        $id_kel = Auth::user()->id_kelurahan;

        if (Auth::user()->id_kelurahan != null) {
            $data = DB::select("SELECT a.*,kc.nama_kecamatan ,kl.kelurahan , m.name AS jenisPMKS FROM t_pmks a, 
            t_kecamatan kc , t_kelurahan kl ,t_kategori_pmks m WHERE a.id_jenis_pmks = m.id AND kc.id = a.id_kecamatan AND 
            kl.id = a.id_kelurahan AND month(a.created_at) = $request->bulan AND a.id_kelurahan ='$id_kel'");

            // $data = Pmks::join('t_kecamatan','t_kecamatan.id','=','t_pmks.id_kecamatan')
            //     ->join('t_kelurahan','t_kelurahan.id','=','t_pmks.id_kelurahan')
            //     ->join('JenisPmks','JenisPmks.id','=','t_pmks.id_jenis_pmks')
            //     ->select('t_pmks.*','JenisPmks.name as jenisPMKS','t_kelurahan.kelurahan','t_kecamatan.nama_kecamatan')
            //     ->where('t_pmks.status','sukses')
            //     ->where('t_pmks.id_kelurahan',Auth::user()->id_kelurahan)
            //     ->whereMonth('t_pmks.created_at',$request->bulan)->get(); 
        } else {
            $data = DB::select("SELECT a.*,kc.nama_kecamatan ,kl.kelurahan , m.name AS jenisPMKS FROM t_pmks a, 
            t_kecamatan kc , t_kelurahan kl ,t_kategori_pmks m WHERE a.id_jenis_pmks = m.id AND kc.id = a.id_kecamatan AND 
            kl.id = a.id_kelurahan AND month(a.created_at) = $request->bulan");

            // $data = Pmks::join('t_kecamatan','t_kecamatan.id','=','t_pmks.id_kecamatan')
            //     ->join('t_kelurahan','t_kelurahan.id','=','t_pmks.id_kelurahan')
            //     ->join('JenisPmks','JenisPmks.id','=','t_pmks.id_jenis_pmks')
            //     ->select('t_pmks.*','JenisPmks.name as jenisPMKS','t_kelurahan.kelurahan','t_kecamatan.nama_kecamatan')
            //     ->where('t_pmks.status','sukses')
            //     ->whereMonth('t_pmks.created_at',$request->bulan)->get();
        }
        return DataTables::of($data)
        ->addIndexColumn()
        ->make(true);
    }
    public function cetakPmks()
    {
        $id_kel = Auth::user()->id_kelurahan;

        if (Auth::user()->id_kelurahan != null) {
            // $data = Pmks::join('t_kecamatan','t_kecamatan.id','=','t_pmks.id_kecamatan')
            //         ->join('t_kelurahan','t_kelurahan.id','=','t_pmks.id_kelurahan')
            //         ->join('JenisPmks','JenisPmks.id','=','t_pmks.id_jenis_pmks')
            //         ->select('t_pmks.*','JenisPmks.name as jenisPMKS','t_kelurahan.kelurahan','t_kecamatan.nama_kecamatan')
            //         ->where('t_pmks.id_kelurahan',Auth::user()->id_kelurahan)
            //         ->where('t_pmks.status','sukses')->get();
            $data = DB::select("SELECT a.*,kc.nama_kecamatan ,kl.kelurahan , m.name AS jenisPMKS FROM t_pmks a, 
            t_kecamatan kc , t_kelurahan kl ,t_kategori_pmks m WHERE a.id_jenis_pmks = m.id AND kc.id = a.id_kecamatan AND 
            kl.id = a.id_kelurahan AND a.id_kelurahan = '$id_kel'");
         } else {
            $data = DB::select("SELECT a.*,kc.nama_kecamatan ,kl.kelurahan , m.name AS jenisPMKS FROM t_pmks a, 
            t_kecamatan kc , t_kelurahan kl ,t_kategori_pmks m WHERE a.id_jenis_pmks = m.id AND kc.id = a.id_kecamatan AND 
            kl.id = a.id_kelurahan ");
         }
        
       
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('laporan.cetakpmks', ['data' => $data])->setOptions(['defaultFont' => 'Lato']);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('Laporan PMKS.pdf');
    }
    public function cetakFilterPmks(Request $request)
    {
        $id_kel = Auth::user()->id_kelurahan;

        if (Auth::user()->id_kelurahan != null) {
            // $data = Pmks::join('t_kecamatan','t_kecamatan.id','=','t_pmks.id_kecamatan')
            //         ->join('t_kelurahan','t_kelurahan.id','=','t_pmks.id_kelurahan')
            //         ->join('JenisPmks','JenisPmks.id','=','t_pmks.id_jenis_pmks')
            //         ->select('t_pmks.*','JenisPmks.name as jenisPMKS','t_kelurahan.kelurahan','t_kecamatan.nama_kecamatan')
            //         ->where('t_pmks.status','sukses')
            //         ->where('t_pmks.id_kelurahan',Auth::user()->id_kelurahan)
            //         ->whereMonth('t_pmks.created_at',$request->bulan)->get();
            $data = DB::select("SELECT a.*,kc.nama_kecamatan ,kl.kelurahan , m.name AS jenisPMKS FROM t_pmks a, 
            t_kecamatan kc , t_kelurahan kl ,t_kategori_pmks m WHERE a.id_jenis_pmks = m.id AND kc.id = a.id_kecamatan AND 
            kl.id = a.id_kelurahan AND month(a.created_at) = $request->bulan AND a.id_kelurahan = '$id_kel'");
        } else {
            // $data = Pmks::join('t_kecamatan','t_kecamatan.id','=','t_pmks.id_kecamatan')
            //         ->join('t_kelurahan','t_kelurahan.id','=','t_pmks.id_kelurahan')
            //         ->join('JenisPmks','JenisPmks.id','=','t_pmks.id_jenis_pmks')
            //         ->select('t_pmks.*','JenisPmks.name as jenisPMKS','t_kelurahan.kelurahan','t_kecamatan.nama_kecamatan')
            //         ->where('t_pmks.status','sukses')
            //         ->whereMonth('t_pmks.created_at',$request->bulan)->get();
            $data = DB::select("SELECT a.*,kc.nama_kecamatan ,kl.kelurahan , m.name AS jenisPMKS FROM t_pmks a, 
            t_kecamatan kc , t_kelurahan kl ,t_kategori_pmks m WHERE a.id_jenis_pmks = m.id AND kc.id = a.id_kecamatan AND 
            kl.id = a.id_kelurahan AND month(a.created_at) = $request->bulan");
        }
        
        
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('laporan.cetakpmks', ['data' => $data])->setOptions(['defaultFont' => 'Lato']);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('Laporan PMKS Bulan '.\Carbon\Carbon::parse(\Carbon\Carbon::createFromFormat('m', $request->bulan) )->translatedFormat('F')  .' .pdf');
    }
    
        // public function dataHasil()
        // {
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
        //         $n = Penilaian::join('t_pmks','t_pmks.id','t_penilaian.id_pmks')
        //     ->select('t_penilaian.*','t_pmks.nama')->get();
        //         foreach ($n as $key => $value) {
        //             return ++$key;
        //         }
        //     })
        //     ->rawColumns(['no'])

        //     ->addIndexColumn()
        //     ->addColumn('jenisPmks', function($row){
        //         $pmks = Pmks::find($row->id_pmks);
        //         $jenispmks = JenisPmks::find($pmks->id_jenis_pmks);

        //         return $jenispmks->name;
        //     })
        //     ->rawColumns(['jenisPmks'])
        //     ->addIndexColumn()
        //     ->addColumn('kecamatan', function($row){
        //         $pmks = Pmks::find($row->id_pmks);
        //         $kecamatan = Kecamatan::find($pmks->id_kecamatan);

        //         return $kecamatan->nama_kecamatan;
        //     })
        //     ->rawColumns(['kecamatan'])
        //     ->addIndexColumn()
        //     ->addColumn('kelurahan', function($row){
        //         $pmks = Pmks::find($row->id_pmks);
        //         $Kelurahan = Kelurahan::find($pmks->id_kelurahan);

        //         return $Kelurahan->kelurahan;
        //     })
        //     ->rawColumns(['kelurahan'])
        //     ->make(true);
        // }
    public function cetakLaporan()
    {
        // $data = DB::select("SELECT pn.id_pmks, p.nama,jp.name as jenisPmks,kec.nama_kecamatan,kel.kelurahan,SUM(pn.final) as total FROM `v_penilaian` pn,t_pmks p , t_kelurahan kel ,t_kecamatan kec, JenisPmks jp WHERE jp.id = p.id_jenis_pmks and pn.id_pmks =p.id AND kel.id = p.id_kelurahan and kec.id = p.id_kecamatan GROUP BY 1 ORDER BY 5 DESC;");
            // $data = DB::select("SELECT pn.id_pmks, p.nama,jp.name as jenisPmks,kec.nama_kecamatan,kel.kelurahan,SUM(pn.final) as total,RANK() OVER ( ORDER BY SUM(pn.final) DESC ) AS rangking FROM `v_penilaian5` pn,t_pmks p , t_kelurahan kel ,t_kecamatan kec, JenisPmks jp WHERE jp.id = p.id_jenis_pmks and pn.id_pmks =p.id AND kel.id = p.id_kelurahan and kec.id = p.id_kecamatan GROUP BY 1");
        $id_kel = Auth::user()->id_kelurahan ;
        if (Auth::user()->id_kelurahan != null) {
            $data = DB::select("SELECT pn.id_pmks, p.nama,jp.name as jenisPmks,kec.nama_kecamatan,kel.kelurahan,SUM(pn.final) as total,RANK() OVER ( ORDER BY SUM(pn.final) DESC ) AS rangking FROM `v_penilaian5` pn,t_pmks p , t_kelurahan kel ,t_kecamatan kec, t_kategori_pmks jp WHERE jp.id = p.id_jenis_pmks and pn.id_pmks =p.id AND kel.id = p.id_kelurahan and kec.id = p.id_kecamatan AND p.id_kelurahan = '$id_kel' GROUP BY 1;");
        } else {
            $data = DB::select("SELECT pn.id_pmks, p.nama, jp.name as jenisPmks,kec.nama_kecamatan,kel.kelurahan,SUM(pn.final) as total,RANK() OVER ( ORDER BY SUM(pn.final) DESC ) AS rangking FROM `v_penilaian5` pn,t_pmks p , t_kelurahan kel ,t_kecamatan kec, t_kategori_pmks jp WHERE jp.id = p.id_jenis_pmks and pn.id_pmks =p.id AND kel.id = p.id_kelurahan and kec.id = p.id_kecamatan GROUP BY 1");
        }
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('laporan.cetakLaporan', ['data' => $data])->setOptions(['defaultFont' => 'Lato']);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('Laporan Hasil PMKS.pdf');
    }
    public function laporanPenyaluran()
    {
        $bulan = DB::select("SELECT * FROM `t_penilaian` GROUP BY month(created_at)");
        // $bulan = Pmks::groupBy('created_at')->get();
        $modul = $this->modul;
        // $data = DB::select("SELECT pn.id_pmks, p.nama,jp.name as jenisPmks,kec.nama_kecamatan,kel.kelurahan,SUM(pn.final) as total,ROW_NUMBER() OVER(ORDER BY 6) RowNumber FROM `v_penilaian5` pn,t_pmks p , t_kelurahan kel ,t_kecamatan kec, JenisPmks jp WHERE jp.id = p.id_jenis_pmks and pn.id_pmks =p.id AND kel.id = p.id_kelurahan and kec.id = p.id_kecamatan GROUP BY 1 ORDER BY 6 DESC");
        return view('laporan.penyaluran',compact('modul','bulan'));

    }
    public function dataLaporanHasil()
    {
        $id_kel = Auth::user()->id_kelurahan ;
        if (Auth::user()->id_kelurahan != null) {
            $data = DB::select("SELECT pn.id_pmks, p.nama,jp.name as jenisPmks,kec.nama_kecamatan,kel.kelurahan,SUM(pn.final) as total,RANK() OVER ( ORDER BY SUM(pn.final) DESC ) AS rangking FROM `v_penilaian5` pn,t_pmks p , t_kelurahan kel ,t_kecamatan kec, t_kategori_pmks jp WHERE jp.id = p.id_jenis_pmks and pn.id_pmks =p.id AND kel.id = p.id_kelurahan and kec.id = p.id_kecamatan AND p.id_kelurahan = '$id_kel' GROUP BY 1;");
        } else {
            $data = DB::select("SELECT pn.id_pmks, p.nama, jp.name as jenisPmks,kec.nama_kecamatan,kel.kelurahan,SUM(pn.final) as total,RANK() OVER ( ORDER BY SUM(pn.final) DESC ) AS rangking FROM `v_penilaian5` pn,t_pmks p , t_kelurahan kel ,t_kecamatan kec, t_kategori_pmks jp WHERE jp.id = p.id_jenis_pmks and pn.id_pmks =p.id AND kel.id = p.id_kelurahan and kec.id = p.id_kecamatan GROUP BY 1");
        }
        
        // $data = DB::select("SELECT pn.id_pmks, p.nama,jp.name as jenisPmks,kec.nama_kecamatan,kel.kelurahan,SUM(pn.final) as total FROM `v_penilaian` pn,t_pmks p , t_kelurahan kel ,t_kecamatan kec, JenisPmks jp WHERE jp.id = p.id_jenis_pmks and pn.id_pmks =p.id AND kel.id = p.id_kelurahan and kec.id = p.id_kecamatan GROUP BY 1 ORDER BY 5 DESC;");
        return DataTables::of($data)
        // ->addIndexColumn()
        ->make(true);
    }
    public function dataLaporanHasilFilter(Request $request)
    {
        $id_kel = Auth::user()->id_kelurahan ;
        if (Auth::user()->id_kelurahan != null) {
            $data = DB::select("SELECT pn.id_pmks, p.nama,jp.name as jenisPmks,kec.nama_kecamatan,kel.kelurahan,SUM(pn.final) as total,RANK() OVER ( ORDER BY SUM(pn.final) DESC ) AS rangking FROM `v_penilaian5` pn,t_pmks p , t_kelurahan kel ,t_kecamatan kec, t_kategori_pmks jp, t_penilaian pni WHERE jp.id = p.id_jenis_pmks and pn.id_pmks =p.id AND kel.id = p.id_kelurahan and kec.id = p.id_kecamatan AND pni.id_pmks = p.id AND month(pni.created_at) =  $request->bulan  AND p.id_kelurahan = '$id_kel' GROUP BY 1");
        } else {
            $data = DB::select("SELECT pn.id_pmks, p.nama, jp.name as jenisPmks,kec.nama_kecamatan,kel.kelurahan,SUM(pn.final) as total,RANK() OVER ( ORDER BY SUM(pn.final) DESC ) AS rangking FROM `v_penilaian5` pn,t_pmks p , t_kelurahan kel ,t_kecamatan kec, t_kategori_pmks jp WHERE jp.id = p.id_jenis_pmks and pn.id_pmks =p.id AND kel.id = p.id_kelurahan and kec.id = p.id_kecamatan AND month(p.created_at) =  $request->bulan GROUP BY 1");
        }
        return DataTables::of($data)
        ->make(true);
    }
    public function cetakLaporanFilter(Request $request)
    {
        // $data = DB::select("SELECT pn.id_pmks, p.nama,jp.name as jenisPmks,kec.nama_kecamatan,kel.kelurahan,SUM(pn.final) as total,RANK() OVER ( ORDER BY SUM(pn.final) DESC ) AS rangking FROM `v_penilaian5` pn,t_pmks p , t_kelurahan kel ,t_kecamatan kec, JenisPmks jp, t_penilaian pni WHERE jp.id = p.id_jenis_pmks and pn.id_pmks =p.id AND kel.id = p.id_kelurahan and kec.id = p.id_kecamatan AND pni.id_pmks = p.id AND month(pni.created_at) =  $request->bulan GROUP BY 1");
        $id_kel = Auth::user()->id_kelurahan ;
        if (Auth::user()->id_kelurahan != null) {
            $data = DB::select("SELECT pn.id_pmks, p.nama,jp.name as jenisPmks,kec.nama_kecamatan,kel.kelurahan,SUM(pn.final) as total,RANK() OVER ( ORDER BY SUM(pn.final) DESC ) AS rangking FROM `v_penilaian5` pn,t_pmks p , t_kelurahan kel ,t_kecamatan kec, t_kategori_pmks jp, t_penilaian pni WHERE jp.id = p.id_jenis_pmks and pn.id_pmks =p.id AND kel.id = p.id_kelurahan and kec.id = p.id_kecamatan AND pni.id_pmks = p.id AND month(pni.created_at) =  $request->bulan  AND p.id_kelurahan = '$id_kel' GROUP BY 1");
        } else {
            $data = DB::select("SELECT pn.id_pmks, p.nama, jp.name as jenisPmks,kec.nama_kecamatan,kel.kelurahan,SUM(pn.final) as total,RANK() OVER ( ORDER BY SUM(pn.final) DESC ) AS rangking FROM `v_penilaian5` pn,t_pmks p , t_kelurahan kel ,t_kecamatan kec, t_kategori_pmks jp WHERE jp.id = p.id_jenis_pmks and pn.id_pmks =p.id AND kel.id = p.id_kelurahan and kec.id = p.id_kecamatan AND month(p.created_at) =  $request->bulan GROUP BY 1");
        }
        // $data = DB::select("SELECT pn.id_pmks, p.nama,jp.name as jenisPmks,kec.nama_kecamatan,kel.kelurahan,SUM(pn.final) as total FROM `v_penilaian` pn,t_pmks p , t_kelurahan kel ,t_kecamatan kec, JenisPmks jp WHERE jp.id = p.id_jenis_pmks and pn.id_pmks =p.id AND kel.id = p.id_kelurahan and kec.id = p.id_kecamatan GROUP BY 1 ORDER BY 5 DESC;");
        // $data = DB::select("SELECT pn.id_pmks, p.nama,jp.name as jenisPmks,kec.nama_kecamatan,kel.kelurahan,SUM(pn.final) as total FROM `v_penilaian` pn,t_pmks p , t_kelurahan kel ,t_kecamatan kec, JenisPmks jp, t_penilaian pni WHERE jp.id = p.id_jenis_pmks and pn.id_pmks =p.id AND kel.id = p.id_kelurahan and kec.id = p.id_kecamatan AND pni.id_pmks = p.id AND month(pni.created_at) =  $request->bulan GROUP BY 1 ORDER BY 5 DESC;");
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('laporan.cetakLaporan', ['data' => $data])->setOptions(['defaultFont' => 'Lato']);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('Laporan Hasil PMKS Bulan '.$request->bulan.'.pdf');
    }
}
