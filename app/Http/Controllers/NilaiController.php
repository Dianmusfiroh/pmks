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
        // $data = DB::table('t_data_kriteria')->get();
        $data = DB::select("SELECT  cp.id, cp.id_pmks,p.nama , jp.value jenispmks,jd.value JenisDisabilitas, sk.value statuskecacatan,srs.value statusRumahstp,skk.value statusKeberadaanKeluargastp,ma.value makanAdl,md.value mandiAdl,pd.value perawatanDiriAdl,pa.value pakaianAdl,ba.value babAdl,ksr.value ketstatusRumahstp,ta.value transferAdl,k.value kppk,u.value uppk FROM `t_calon_penerima` cp, JenisPmks jp, JenisDisabilitas jd,spesifikasiKecatatan sk,statusRumahstp srs, statusKeberadaanKeluargastp skk, makanAdl ma, mandiAdl md ,perawatanDiriAdl pd ,pakaianAdl pa ,babAdl ba, ketstatusRumahstp ksr,transferAdl ta,kppk k, usulanBantuan u, t_pmks p WHERE 
        cp.id_jenis_pmks = jp.id AND cp.id_jenis_disabilitas = jd.id AND cp.id_spesific_cacat = sk.id AND cp.id_status_rumah = srs.id AND cp.id_status_keberadaan_keluarga = skk.id AND cp.id_adl_makan = ma.id AND cp.id_adl_mandi = md.id AND cp.id_adl_perawatan = pd.id AND cp.id_adl_pakaian = pa.id AND cp.id_adl_bab = ba.id AND cp.id_ket_status_rumah = ksr.id AND cp.id_adl_transfer =ta.id AND cp.id_kppk = k.id AND cp.id_uppk = u.id AND p.id = cp.id_pmks;");
        return view('nilai.utility',compact('data'));
    }
    public function getUtility()
    {
        $data = DB::select("SELECT  cp.id, cp.id_pmks,p.nama , jp.value jenispmks,jd.value JenisDisabilitas, sk.value statuskecacatan,srs.value statusRumahstp,skk.value statusKeberadaanKeluargastp,ma.value makanAdl,md.value mandiAdl,pd.value perawatanDiriAdl,pa.value pakaianAdl,ba.value babAdl,ksr.value ketstatusRumahstp,ta.value transferAdl,k.value kppk,u.value uppk FROM `t_calon_penerima` cp, JenisPmks jp, JenisDisabilitas jd,spesifikasiKecatatan sk,statusRumahstp srs, statusKeberadaanKeluargastp skk, makanAdl ma, mandiAdl md ,perawatanDiriAdl pd ,pakaianAdl pa ,babAdl ba, ketstatusRumahstp ksr,transferAdl ta,kppk k, usulanBantuan u, t_pmks p WHERE 
        cp.id_jenis_pmks = jp.id AND cp.id_jenis_disabilitas = jd.id AND cp.id_spesific_cacat = sk.id AND cp.id_status_rumah = srs.id AND cp.id_status_keberadaan_keluarga = skk.id AND cp.id_adl_makan = ma.id AND cp.id_adl_mandi = md.id AND cp.id_adl_perawatan = pd.id AND cp.id_adl_pakaian = pa.id AND cp.id_adl_bab = ba.id AND cp.id_ket_status_rumah = ksr.id AND cp.id_adl_transfer =ta.id AND cp.id_kppk = k.id AND cp.id_uppk = u.id AND p.id = cp.id_pmks;");
         return DataTables::of($data)
        //  ->addIndexColumn()
        //  ->addColumn('hasil', function($row){
        //     $jenispmks = (100-$row->jenispmks)/100*100; 
        //     $jenisDisabilitas = (100-$row->JenisDisabilitas)/100*100; 
        //     $statuskecacatan = (100-$row->statuskecacatan)/100*100; 
        //     $statusRumahstp = (100-$row->statusRumahstp)/100*100; 
        //     $transferAdl = (100-$row->transferAdl)/100*100; 
        //     $statusKeberadaanKeluargastp = (100-$row->statusKeberadaanKeluargastp)/100*100; 
        //     $makanAdl = (100-$row->makanAdl)/100*100; 
        //     $mandiAdl = (100-$row->mandiAdl)/100*100; 
        //     $perawatanDiriAdl = (100-$row->perawatanDiriAdl)/100*100; 
        //     $pakaianAdl = (100-$row->pakaianAdl)/100*100; 
        //     $babAdl = (100-$row->babAdl)/100*100; 
        //     $ketstatusRumahstp = (100-$row->ketstatusRumahstp)/100*100; 
        //     $kppk = (100-$row->kppk)/100*100; 
        //     $uppk = (100-$row->uppk)/100*100; 
        //     $hasil = $jenisDisabilitas + $jenispmks + $statuskecacatan + $statusRumahstp + $transferAdl+$statusKeberadaanKeluargastp 
        //             +$makanAdl+$mandiAdl+$perawatanDiriAdl + $pakaianAdl + $babAdl+$ketstatusRumahstp +$kppk+$uppk; 
        //  })
        //  ->rawColumns(['hasil'])
         ->addIndexColumn()
         ->addColumn('utility', function($row){
            $score = DB::table('t_score')->join('t_data_kriteria','t_data_kriteria.id','=','t_score.id_data_kriteria')->get();

            $jenispmks = ((100-$row->jenispmks)/100*100)*($score[13]->score/100); 
            $jenisDisabilitas = ((100-$row->JenisDisabilitas)/100*100)*($score[10]->score/100); 
            $statuskecacatan = ((100-$row->statuskecacatan)/100*100)*($score[0]->score/100); 
            $statusRumahstp = ((100-$row->statusRumahstp)/100*100)*($score[12]->score/100); 
            $transferAdl = ((100-$row->transferAdl)/100*100)*($score[7]->score/100); 
            $statusKeberadaanKeluargastp = ((100-$row->statusKeberadaanKeluargastp)/100*100)*($score[1]->score/100); 
            $makanAdl = ((100-$row->makanAdl)/100*100)*($score[11]->score/100); 
            $mandiAdl = ((100-$row->mandiAdl)/100*100)*($score[3]->score/100); 
            $perawatanDiriAdl = ((100-$row->perawatanDiriAdl)/100*100)*($score[6]->score/100); 
            $pakaianAdl = ((100-$row->pakaianAdl)/100*100)*($score[5]->score/100); 
            $babAdl = ((100-$row->babAdl)/100*100)*($score[4]->score/100); 
            $ketstatusRumahstp = ((100-$row->ketstatusRumahstp)/100*100)*($score[2]->score/100); 
            $kppk = ((100-$row->kppk)/100*100)*($score[8]->score/100); 
            $uppk = ((100-$row->uppk)/100*100)*($score[9]->score/100); 
            $hasil = $jenisDisabilitas + $jenispmks + $statuskecacatan + $statusRumahstp + $transferAdl+$statusKeberadaanKeluargastp 
                    +$makanAdl+$mandiAdl+$perawatanDiriAdl + $pakaianAdl + $babAdl+$ketstatusRumahstp +$kppk+$uppk; 
                   return $hasil;
        
                })
         ->rawColumns(['utility'])
         ->make(true);
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
