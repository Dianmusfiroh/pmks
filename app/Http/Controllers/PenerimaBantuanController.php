<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\ScoreHasil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JeroenNoten\LaravelAdminLte\View\Components\Tool\Datatable;
use PhpParser\Node\Stmt\Return_;
use Yajra\DataTables\Facades\DataTables;

class PenerimaBantuanController extends Controller
{
    public function __construct(){
        $this->modul = 'penerimaBantuan';

    }
    public function index()
    {
        $modul = $this->modul;
        $penerima = DB::select("SELECT DISTINCT p.nama, p.no_kk, p.nik ,jp.name AS jenis_pmks, hs.status FROM `t_hasil_score` hs, t_calon_penerima cp, t_pmks p, JenisPmks jp WHERE hs.id_calon_penerima = cp.id AND cp.id_pmks = p.id AND jp.id = cp.id_jenis_pmks");
        return view('penerimaBantuan.index',compact('modul','penerima'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('penerimaBantuan.add',compact('modul'));

    }
    public function generate(Request $request)
    {
        $get = DB::select('SELECT cp.id, (jp.value+jd.value+sk.value+sr.value+skk.value+ma.value+m.value+pd.value+pa.value+ba.value+ksr.value+ta.value+k.value+ub.value) AS total FROM `t_calon_penerima` cp, t_pmks p, JenisPmks jp, JenisDisabilitas jd,spesifikasiKecatatan sk,statusRumahstp sr,statusKeberadaanKeluargastp skk, makanAdl ma, mandiAdl m , perawatanDiriAdl pd, pakaianAdl pa, babAdl ba, ketstatusRumahstp ksr, transferAdl ta, kppk k, usulanBantuan ub WHERE cp.id_pmks = p.id AND cp.id_jenis_pmks = jp.id AND cp.id_uppk = ub.id and cp.id_jenis_disabilitas = jd.id AND cp.id_spesific_cacat = sk.id AND sr.id = cp.id_status_rumah AND skk.id = cp.id_status_keberadaan_keluarga AND cp.id_adl_bab = ba.id AND ma.id = cp.id_adl_makan AND m.id =cp.id_adl_mandi AND cp.id_adl_perawatan =pd.id AND cp.id_adl_pakaian = pa.id AND ksr.id = cp.id_ket_status_rumah AND ta.id =cp.id_adl_transfer AND k.id = cp.id_kppk GROUP BY cp.id_pmks');
        $batasScore = Score::first();
            foreach ($get as  $value) {
                if ($value->total > $batasScore->score) {
                    $post = ScoreHasil::create([
                        'id_calon_penerima' => $value->id,
                        'total' => $value->total,
                        'status' =>"Lolos",
            
                    ]);
                }
                
            }
        $penerima = DB::select("SELECT DISTINCT cp.id, p.nama, p.no_kk, p.nik ,jp.name AS jenis_pmks, hs.status FROM `t_hasil_score` hs, t_calon_penerima cp, t_pmks p, JenisPmks jp WHERE hs.id_calon_penerima = cp.id AND cp.id_pmks = p.id AND jp.id = cp.id_jenis_pmks;");
      
        
        return DataTables::of($penerima)
        ->addIndexColumn()
        ->make(true);
    }
}
