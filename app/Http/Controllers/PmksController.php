<?php

namespace App\Http\Controllers;

use App\Models\AdlBab;
use App\Models\AdlMakan;
use App\Models\AdlMandi;
use App\Models\AdlPakaian;
use App\Models\AdlPerawatanDiri;
use App\Models\AdlTransfer;
use App\Models\DataMaster;
use App\Models\JenisDisabilitas;
use App\Models\JenisPmks;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kppk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Pmks;
use App\Models\SpesificKecacatan;
use App\Models\StpKetStatusRumah;
use App\Models\StpStatusKeberadaanKel;
use App\Models\StpStatusRumah;
use App\Models\Uppk;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class PmksController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'pmks';
    }
    public function index()
    {

        $modul = $this->modul;
        $pmks = Pmks::all();
        // $kelurahanpmks = Pmks::select('kelurahan')->groupBy('kelurahan')->get();
        // $optJenisPmks = Pmks::join('JenisPmks','JenisPmks.id','=','t_pmks.id_jenis_pmks')
        //                 ->select('JenisPmks.name','t_pmks.id_jenis_pmks')->groupBy('t_pmks.id_jenis_pmks')
        //                 ->get();
        // $jenisDisabilitas = DataMaster::where('jenis','jenis_disabilitas')->get();
        // $jenisPmks = JenisPmks::all();
        // $spesificKecacatan = SpesificKecacatan::all();
        // $stsKeberadaanKeluarga = StpStatusKeberadaanKel::all();
        // $stsRumah = StpStatusRumah::all();
        // $ketStsRumah = StpKetStatusRumah::all();
        // $adlMandi = AdlMandi::all();
        // $adlMakan = AdlMakan::all();
        // $adlBab = AdlBab::all();
        // $adlPakaian = AdlPakaian::all();
        // $adlPerawatanDiri = AdlPerawatanDiri::all();
        // $adlTransfer = AdlTransfer::all();
        // $kppk = Kppk::all();
        // $uppk = Uppk::all();
        // $pmksKonfirmasi = Pmks::where('status', 'konfirmasi')->get();
        return view('pmks.index', compact('modul'));
    }
    public function create()
    {

        $modul = $this->modul;
        $jenisDisabilitas = DataMaster::where('jenis','jenis_disabilitas')->get();
        $jenisPmks = DataMaster::where('jenis','jenis_pmks')->get();
        $spesificKecacatan = DataMaster::where('jenis','spesific_kecacatan')->get();
        $stsKeberadaanKeluarga = DataMaster::where('jenis','status_keberadaan_keluarga')->get();
        $stsRumah = DataMaster::where('jenis','status_rumah')->get();
        $ketStsRumah = DataMaster::where('jenis','keterangan_status_rumah')->get();
        $adlMandi = DataMaster::where('jenis','adl_mandi')->get();
        $adlMakan = DataMaster::where('jenis','adl_makan')->get();
        $adlBab = DataMaster::where('jenis','adl_bab')->get();
        $adlPakaian = DataMaster::where('jenis','adl_pakaian')->get();
        $adlPerawatanDiri = DataMaster::where('jenis','adl_perawatan_diri')->get();
        $adlTransfer = DataMaster::where('jenis','adl_transfer')->get();
        $kppk = DataMaster::where('jenis','kppk')->get();
        $uppk = DataMaster::where('jenis','uppk')->get();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        // dd($kelurahan);
        return view('pmks.add', compact('modul','kecamatan','kelurahan','jenisDisabilitas','jenisPmks','spesificKecacatan'
        ,'stsKeberadaanKeluarga','stsRumah','ketStsRumah','adlMandi','adlMakan','adlBab'
        ,'adlPakaian','adlPerawatanDiri','adlTransfer','kppk','uppk'));
    }
    public function filter(Request $request)
    {
        $pmks = Pmks::where('id_jenis_pmks',$request->jp)
                    ->where('kelurahan',$request->kel)
                    ->get();
        return DataTables::of($pmks)
        ->make(true);
    }
    public function dataPmksKonfirmasi(Request $request)
    {
        $pmks = Pmks::where('id_kelurahan',auth()->user()->id_kelurahan)->get();
        // dd($pmks);
        return DataTables::of($pmks)
        ->addIndexColumn()
        ->addColumn('kelurahan', function($row){
            $kelurahan = Kelurahan::select('kelurahan')->where('id',$row->id_kelurahan)->get();
            return $kelurahan[0]->kelurahan;
        })
        ->rawColumns(['kelurahan'])
        ->addIndexColumn()
        ->addColumn('kecamatan', function($row){
            $kecamatan = Kecamatan::select('nama_kecamatan')->where('id',$row->id_kecamatan)->get();
            return $kecamatan[0]->nama_kecamatan;
        })
        ->rawColumns(['kelurahan'])
        ->addIndexColumn()
        ->addColumn('jenis_pmks', function($row){
        //    dd($row->JenisPmks[0]->name);
                $data = DataMaster::select('name')->where('id',$row->id_jenis_pmks)->get();
                if ( $data == '') {
                    return 'null';
                }
                return $data[0]->name;
        })
        ->rawColumns(['jenis_pmks'])
        ->make(true);
    }
    public function dataPmks(Request $request)
    {
        $pmks = Pmks::all();
        // dd($pmks);
        return DataTables::of($pmks)
        ->addIndexColumn()
        ->addColumn('kelurahan', function($row){
            $kelurahan = Kelurahan::select('kelurahan')->where('id',$row->id_kelurahan)->get();
            return $kelurahan[0]->kelurahan;
        })
        ->rawColumns(['kelurahan'])
        ->addIndexColumn()
        ->addColumn('kecamatan', function($row){
            $kecamatan = Kecamatan::select('nama_kecamatan')->where('id',$row->id_kecamatan)->get();
            return $kecamatan[0]->nama_kecamatan;
        })
        ->rawColumns(['kelurahan'])
        ->addIndexColumn()
        ->addColumn('jenis_pmks', function($row){
        //    dd($row->JenisPmks[0]->name);
            $data = DataMaster::select('name')->where('id',$row->id_jenis_pmks)->get();
            if ( $data == '') {
                return 'null';
            }
            return $data[0]->name;
        })
        ->rawColumns(['jenis_pmks'])
        ->make(true);
    }

    public function memberStatus(Request $request)
    {
        $pmks = Pmks::find($request->id_pmks);
        $pmks->status = 'sukses';
        $pmks->save();
    }
    public function dataKec(Request $request)
    {
        $kelurahan = Kelurahan::where('id_kecamatan',$request->id_kecamatan)->get();
        // $kecamatan  = Kecamatan::find($kelurahan);
        if ($kelurahan->count() > 0) {
            foreach ($kelurahan as  $value) {
            // dd($value->id);
            // echo '<p>ada</p>';
                echo  '<option value="'.$value->id.'">'.$value->kelurahan.'</option>';

            }      
        } else {
            echo "<option selected>- Data Wilayah Tidak Ada, Pilih Yang Lain -</option>";
        }
        
        // echo $kelurahan;
        // echo json_encode($kelurahan);
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'nama' => 'required',
            'no_kk' => 'required',
            'nik' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'id_kelurahan' => 'required',
            'id_kecamatan' => 'required',
            'jenis_kelamin' => 'required',
            'id_dtks' => 'required',
            'id_jenis_pmks' => 'required',
            'ket_jenis_pmks' => 'required',
            'id_jenis_disabilitas' => 'required',
            'id_spesific_cacat' => 'required',
            'id_status_rumah' => 'required',
            'id_status_keberadaan_keluarga' => 'required',
            'id_adl_makan' => 'required',
            'id_adl_mandi' => 'required',
            'id_adl_perawatan' => 'required',
            'id_adl_pakaian' => 'required',
            'id_adl_bab' => 'required',
            'id_ket_status_rumah' => 'required',
            'id_adl_transfer' => 'required',
            'id_kppk' => 'required',
            'id_uppk' => 'required',
            'ket_uppk' => 'required',
        ]);

        $post = Pmks::create([
            'nama' => $request->nama,
            'no_kk' =>  $request->no_kk,
            'nik' =>  $request->nik,
            'tgl_lahir' =>  $request->tgl_lahir,
            'alamat' =>  $request->alamat,
            'id_kelurahan' =>  $request->id_kelurahan,
            'id_kecamatan' =>  $request->id_kecamatan,
            'jenis_kelamin' =>  $request->jenis_kelamin,
            'status' => 'konfirmasi',
            'id_dtks' => $request->id_dtks,
            'id_jenis_pmks'=> $request->id_jenis_pmks,
            'ket_jenis_pmks'=> $request->ket_jenis_pmks,
            'id_jenis_disabilitas'=> $request->id_jenis_disabilitas,
            'id_spesific_cacat'=> $request->id_spesific_cacat,
            'id_status_rumah'=> $request->id_status_rumah,
            'id_status_keberadaan_keluarga'=> $request->id_status_keberadaan_keluarga,
            'id_adl_makan'=> $request->id_adl_makan,
            'id_adl_mandi'=> $request->id_adl_mandi,
            'id_adl_perawatan'=> $request->id_adl_perawatan,
            'id_adl_pakaian'=> $request->id_adl_pakaian,
            'id_adl_bab'=> $request->id_adl_bab,
            'id_ket_status_rumah'=> $request->id_ket_status_rumah,
            'id_adl_transfer'=> $request->id_adl_transfer,
            'id_kppk'=> $request->id_kppk,
            'id_uppk'=> $request->id_uppk,
            'ket_uppk'=> $request->ket_uppk,
            'id_user'=> auth()->user()->id,
            
        ]);

        if ($post) {
            return redirect()
                ->route('pmks.index')
                ->with([
                   'success' => 'Data Berhasil Dibuat'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                   'error' => 'Terjadi Kesalahan, Coba Lagi'                
                ]);
        }
    }
    public function edit(Request $request, $id)
    {
        $pmks = DB::select("SELECT a.*,kc.nama_kecamatan ,kl.kelurahan , d.jenis_disabilitas, p.jenis_pmks, sc.spesific_cacat,sr.status_rumah , skk.status_keberadaan_keluarga , amkn.adl_makan , amnd.adl_mandi, aper.adl_perawatan, apk.adl_pakaian, ab.adl_bab , ksr.ket_status_rumah, at.adl_transfer , k.kppk ,u.uppk FROM
        (SELECT m.name AS jenis_disabilitas FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_jenis_disabilitas = m.id) AS d ,
        (SELECT m.name AS jenis_pmks FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_jenis_pmks = m.id) AS p,
        (SELECT m.name AS spesific_cacat FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_spesific_cacat = m.id) AS sc ,
        (SELECT m.name AS status_rumah FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_status_rumah = m.id) AS sr,
        (SELECT m.name AS status_keberadaan_keluarga FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_status_keberadaan_keluarga = m.id) AS skk ,
        (SELECT m.name AS adl_makan FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_adl_makan = m.id) AS amkn,
        (SELECT m.name AS adl_mandi FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_adl_mandi = m.id) AS amnd ,
        (SELECT m.name AS adl_perawatan FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_adl_perawatan = m.id) AS aper,
        (SELECT m.name AS adl_pakaian FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_adl_pakaian = m.id) AS apk ,
        (SELECT m.name AS adl_bab FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_adl_bab = m.id) AS ab ,
        (SELECT m.name AS ket_status_rumah FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_ket_status_rumah = m.id) AS ksr ,
        (SELECT m.name AS adl_transfer FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_adl_transfer = m.id) AS at ,
        (SELECT m.name AS kppk FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_kppk = m.id) AS k ,
        (SELECT m.name AS uppk FROM `t_pmks`p, t_kategori_pmks m WHERE p.	id_uppk = m.id) AS u, t_pmks a, t_kecamatan kc , t_kelurahan kl WHERE kc.id = a.id_kecamatan AND kl.id = a.id_kelurahan AND a.id =  $id LIMIT 1 ");
        // dd($pmks[0]->id);
        $modul = $this->modul;
        $jenisDisabilitas = DataMaster::where('jenis','jenis_disabilitas')->get();
        $jenisPmks = DataMaster::where('jenis','jenis_pmks')->get();
        $spesificKecacatan = DataMaster::where('jenis','spesific_kecacatan')->get();
        $stsKeberadaanKeluarga = DataMaster::where('jenis','status_keberadaan_keluarga')->get();
        $stsRumah = DataMaster::where('jenis','status_rumah')->get();
        $ketStsRumah = DataMaster::where('jenis','keterangan_status_rumah')->get();
        $adlMandi = DataMaster::where('jenis','adl_mandi')->get();
        $adlMakan = DataMaster::where('jenis','adl_makan')->get();
        $adlBab = DataMaster::where('jenis','adl_bab')->get();
        $adlPakaian = DataMaster::where('jenis','adl_pakaian')->get();
        $adlPerawatanDiri = DataMaster::where('jenis','adl_perawatan_diri')->get();
        $adlTransfer = DataMaster::where('jenis','adl_transfer')->get();
        $kppk = DataMaster::where('jenis','kppk')->get();
        $uppk = DataMaster::where('jenis','uppk')->get();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        return view('pmks.edit', compact('modul', 'pmks','jenisDisabilitas','jenisPmks','spesificKecacatan'
        ,'stsKeberadaanKeluarga','stsRumah','kecamatan','kelurahan','ketStsRumah','adlMandi','adlMakan','adlBab'
        ,'adlPakaian','adlPerawatanDiri','adlTransfer','kppk','uppk'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'no_kk' => 'required',
            'nik' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'id_kelurahan' => 'required',
            'id_kecamatan' => 'required',
            'jenis_kelamin' => 'required',
            'id_dtks' => 'required',
            'id_jenis_pmks' => 'required',
            'ket_jenis_pmks' => 'required',
            'id_jenis_disabilitas' => 'required',
            'id_spesific_cacat' => 'required',
            'id_status_rumah' => 'required',
            'id_status_keberadaan_keluarga' => 'required',
            'id_adl_makan' => 'required',
            'id_adl_mandi' => 'required',
            'id_adl_perawatan' => 'required',
            'id_adl_pakaian' => 'required',
            'id_adl_bab' => 'required',
            'id_ket_status_rumah' => 'required',
            'id_adl_transfer' => 'required',
            'id_kppk' => 'required',
            'id_uppk' => 'required',
            'ket_uppk' => 'required',
        ]);
        $post = Pmks::findOrFail($id);

        $post->update([
            'nama' => $request->nama,
            'no_kk' =>  $request->no_kk,
            'nik' =>  $request->nik,
            'tgl_lahir' =>  $request->tgl_lahir,
            'alamat' =>  $request->alamat,
            'id_kelurahan' =>  $request->id_kelurahan,
            'id_kecamatan' =>  $request->id_kecamatan,
            'jenis_kelamin' =>  $request->jenis_kelamin,
            'id_dtks' => $request->id_dtks,
            'id_jenis_pmks'=> $request->id_jenis_pmks,
            'ket_jenis_pmks'=> $request->ket_jenis_pmks,
            'id_jenis_disabilitas'=> $request->id_jenis_disabilitas,
            'id_spesific_cacat'=> $request->id_spesific_cacat,
            'id_status_rumah'=> $request->id_status_rumah,
            'id_status_keberadaan_keluarga'=> $request->id_status_keberadaan_keluarga,
            'id_adl_makan'=> $request->id_adl_makan,
            'id_adl_mandi'=> $request->id_adl_mandi,
            'id_adl_perawatan'=> $request->id_adl_perawatan,
            'id_adl_pakaian'=> $request->id_adl_pakaian,
            'id_adl_bab'=> $request->id_adl_bab,
            'id_ket_status_rumah'=> $request->id_ket_status_rumah,
            'id_adl_transfer'=> $request->id_adl_transfer,
            'id_kppk'=> $request->id_kppk,
            'id_uppk'=> $request->id_uppk,
            'ket_uppk'=> $request->ket_uppk,
            'id_user'=> auth()->user()->id,
        ]);

        if ($post) {
            return redirect()
                ->route('pmks.index')
                ->with([
                     'success' => 'Data Berhasil Diupdate'
                ]);
        } else {
        return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi Kesalahan, Coba Lagi'
                ]);
        }
    }
    public function status(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);

        $post = Pmks::findOrFail($id);

        $post->update([
            'status' => $request->status,
        ]);

        if ($post) {
            return redirect()
                ->route('pmks.index')
                ->with([
                     'success' => 'Data Berhasil Diupdate'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi Kesalahan, Coba Lagi'
                ]);
        }
    }
    public function show(Request $request,$id)
    {
        $pmks = DB::select("SELECT a.*,kc.nama_kecamatan ,kl.kelurahan , d.jenis_disabilitas, p.jenis_pmks, sc.spesific_cacat,sr.status_rumah , skk.status_keberadaan_keluarga , amkn.adl_makan , amnd.adl_mandi, aper.adl_perawatan, apk.adl_pakaian, ab.adl_bab , ksr.ket_status_rumah, at.adl_transfer , k.kppk ,u.uppk FROM
        (SELECT m.name AS jenis_disabilitas FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_jenis_disabilitas = m.id) AS d ,
        (SELECT m.name AS jenis_pmks FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_jenis_pmks = m.id) AS p,
        (SELECT m.name AS spesific_cacat FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_spesific_cacat = m.id) AS sc ,
        (SELECT m.name AS status_rumah FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_status_rumah = m.id) AS sr,
        (SELECT m.name AS status_keberadaan_keluarga FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_status_keberadaan_keluarga = m.id) AS skk ,
        (SELECT m.name AS adl_makan FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_adl_makan = m.id) AS amkn,
        (SELECT m.name AS adl_mandi FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_adl_mandi = m.id) AS amnd ,
        (SELECT m.name AS adl_perawatan FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_adl_perawatan = m.id) AS aper,
        (SELECT m.name AS adl_pakaian FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_adl_pakaian = m.id) AS apk ,
        (SELECT m.name AS adl_bab FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_adl_bab = m.id) AS ab ,
        (SELECT m.name AS ket_status_rumah FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_ket_status_rumah = m.id) AS ksr ,
        (SELECT m.name AS adl_transfer FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_adl_transfer = m.id) AS at ,
        (SELECT m.name AS kppk FROM `t_pmks`p, t_kategori_pmks m WHERE p.id_kppk = m.id) AS k ,
        (SELECT m.name AS uppk FROM `t_pmks`p, t_kategori_pmks m WHERE p.	id_uppk = m.id) AS u, t_pmks a, t_kecamatan kc , t_kelurahan kl WHERE kc.id = a.id_kecamatan AND kl.id = a.id_kelurahan AND a.id =  $id limit 1");
      
        // dd($pmks);
        $modul = $this->modul;
        return view('pmks.show', compact('modul', 'pmks'));
    
    }
    public function lihat(Request $request,$id)
    {
        $pmks = Pmks::findOrFail($id);
        $modul = $this->modul;
        return view('pmks.tolak', compact('modul', 'pmks'));
    }
    public function destroy(Request $request, $id)
    {
        $post = Pmks::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('pmks.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('Kategori.index')
                ->with([
                    'error' => 'Terjadi Kesalahan, Coba Lagi'

                ]);
        }
    }
}
