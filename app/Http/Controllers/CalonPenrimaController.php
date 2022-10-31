<?php

namespace App\Http\Controllers;

use App\Models\AdlBab;
use App\Models\AdlMakan;
use App\Models\AdlMandi;
use App\Models\AdlPakaian;
use App\Models\AdlPerawatanDiri;
use App\Models\AdlTransfer;
use Illuminate\Http\Request;
use App\Models\CalonPenerima;
use App\Models\JenisDisabilitas;
use App\Models\JenisPmks;
use App\Models\Kppk;
use App\Models\SpesificKecacatan;
use App\Models\StpKetStatusRumah;
use App\Models\StpStatusKeberadaanKel;
use App\Models\StpStatusRumah;
use App\Models\Uppk;
use RealRashid\SweetAlert\Facades\Alert;

class CalonPenrimaController extends Controller
{
    public function __construct(){
        $this->modul = 'calonPenerima';

    }
    public function index()
    {
        $modul = $this->modul;
        $calonPenerima = CalonPenerima::all();
        return view('calonPenerima.index',compact('modul','calonPenerima'));

    }
    public function create()
    {
        $modul = $this->modul;
        $jenisDisabilitas = JenisDisabilitas::all();
        $jenisPmks = JenisPmks::all();
        $spesificKecacatan = SpesificKecacatan::all();
        $stsKeberadaanKeluarga = StpStatusKeberadaanKel::all();
        $stsRumah = StpStatusRumah::all();
        $ketStsRumah = StpKetStatusRumah::all();
        $adlMandi = AdlMandi::all();
        $adlMakan = AdlMakan::all();
        $adlBab = AdlBab::all();
        $adlPakaian = AdlPakaian::all();
        $adlPerawatanDiri = AdlPerawatanDiri::all();
        $adlTransfer = AdlTransfer::all();
        $kppk = Kppk::all();
        $uppk = Uppk::all();
        return view('calonPenerima.add',compact('modul','jenisDisabilitas','jenisPmks','spesificKecacatan'
        ,'stsKeberadaanKeluarga','stsRumah','ketStsRumah','adlMandi','adlMakan','adlBab'
        ,'adlPakaian','adlPerawatanDiri','adlTransfer','kppk','uppk'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'id_pmks' => 'required',
            'id_jenis_pmks' => 'required',
            'ket_jenis_pmks' => 'required',
            'id_jenis_disabilitas' => 'required',
            'id_spesific_cacat' => 'required',
            'id_status_rumah' => 'required',
            'id_status_keberadaan_keluarga' => 'required',
            'id_adl_makan' => 'required',
            'id_adl_mandi',
            'id_adl_perawatan' => 'required',
            'id_adl_pakaian',
            'id_adl_bab',
            'id_ket_status_rumah' => 'required',
            'id_adl_transfer' => 'required',
            'id_kppk' => 'required',
            'id_uppk' => 'required',
            'ket_uppk' => 'required',
            'id_user' => 'required',
            

        ]);
        $post = CalonPenerima::create([

            'id_pmks' => $request->id_pmks,
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
            'id_user'=> auth()->user(),

        ]);

        if ($post) {
            return redirect()
                ->route('calonPenerima.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
    public function edit(Request $request,$id)
    {
        $CalonPenerima = CalonPenerima::findOrFail($id);
        $modul = $this->modul;
        return view('calonPenerima.edit', compact('modul','CalonPenerima'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'id_pmks' => 'required',
            'id_jenis_pmks' => 'required',
            'ket_jenis_pmks' => 'required',
            'id_jenis_disabilitas' => 'required',
            'id_spesific_cacat' => 'required',
            'id_status_rumah' => 'required',
            'id_status_keberadaan_keluarga' => 'required',
            'id_adl_makan' => 'required',
            'id_adl_mandi',
            'id_adl_perawatan' => 'required',
            'id_adl_pakaian',
            'id_adl_bab',
            'id_ket_status_rumah' => 'required',
            'id_adl_transfer' => 'required',
            'id_kppk' => 'required',
            'id_uppk' => 'required',
            'ket_uppk' => 'required',
            'id_user' => 'required',
        
        ]);
        // dd($request->kategori_bisnis);
        $post = calonPenerima::findOrFail($id);

        $post->update([
           
            'id_pmks' => $request->id_pmks,
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
            'id_user'=> auth()->user(),
        ]);

        if ($post) {
            return redirect()
                ->route('calonPenerima.index')
                ->with([
                    'success' => 'Calon Penerima Berhasil Diupdate'
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

    public function show(Request $request)
    {
        # code...
    }
    public function destroy(Request $request,$id)
    {
        $post = calonPenerima::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('calonPenerima.index')
                ->with([
                    'success' => 'Kategori has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('Kategori.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }

}
