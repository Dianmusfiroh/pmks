<?php

namespace App\Http\Controllers;

use App\Models\DataAlternatif;
use App\Models\Penilaian;
use App\Models\Pmks;
use App\Models\subKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'penilaian';
    }
    public function index()
    {
        $modul = $this->modul;
        $data = DB::table('t_penilaian')->join('t_pmks', 't_pmks.id', '=', 't_penilaian.id_pmks')
            ->select('t_penilaian.*', 't_pmks.nama')->get();
        // $data = DataAlternatif::join('t_pmks','t_pmks.id','t_alternatif.id_pmks')
        // ->select('t_alternatif.id AS idAlternatif','t_pmks.*')
        // ->get();
        return view('penilaian.index', compact('modul', 'data'));
    }
    public function create()
    {
        $modul = $this->modul;
        $pmks = DB::select("SELECT * FROM `t_pmks` p WHERE id NOT IN ( SELECT id_pmks FROM t_penilaian )");
        // $pmks = Pmks::all();
        $kepemilikanRumah = subKriteria::where('id_data_kriteria', 12)->get();
        $tanggungan = subKriteria::where('id_data_kriteria', 13)->get();
        $pendapatan = subKriteria::where('id_data_kriteria', 14)->get();
        $pekerjaan = subKriteria::where('id_data_kriteria', 15)->get();
        $kondisiRumah = subKriteria::where('id_data_kriteria', 16)->get();
        $pendidikan = subKriteria::where('id_data_kriteria', 17)->get();
        $penerangan = subKriteria::where('id_data_kriteria', 18)->get();
        $dtks = subKriteria::where('id_data_kriteria', 19)->get();
        return view('penilaian.add', compact(
            'modul',
            'pmks',
            'kepemilikanRumah',
            'tanggungan',
            'dtks',
            'pendapatan',
            'pekerjaan',
            'kondisiRumah',
            'pendidikan',
            'penerangan'
        ));
    }

    public function edit(Request $request, $id)
    {
        $modul = $this->modul;
        $data = Penilaian::find($id);
        $dataKepemilikanRumah = DB::select("SELECT sd.* FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_kepemilikan_rumah AND p.id = $id");
        $datatanggungan = DB::select("SELECT sd.* FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_tanggungan AND p.id = $id");
        $datapendapatan = DB::select("SELECT sd.* FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_pendapatan AND p.id = $id");
        $datapekerjaan = DB::select("SELECT sd.* FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_pekerjaan AND p.id = $id");
        $datakondisiRumah = DB::select("SELECT sd.* FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_kondisi_rumah AND p.id = $id");
        $datapendidikan = DB::select("SELECT sd.* FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_pendidikan AND p.id = $id");
        $datapenerangan = DB::select("SELECT sd.* FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sub_penerangan AND p.id = $id");
        $datadtks = DB::select("SELECT sd.* FROM `t_penilaian` p, t_sub_data_kriteria sd WHERE sd.id = p.id_sun_dtks AND p.id = $id");
        $pmks = Pmks::all();
        // dd($data);
        $kepemilikanRumah = subKriteria::where('id_data_kriteria', 12)->get();
        $tanggungan = subKriteria::where('id_data_kriteria', 13)->get();
        $pendapatan = subKriteria::where('id_data_kriteria', 14)->get();
        $pekerjaan = subKriteria::where('id_data_kriteria', 15)->get();
        $kondisiRumah = subKriteria::where('id_data_kriteria', 16)->get();
        $pendidikan = subKriteria::where('id_data_kriteria', 17)->get();
        $penerangan = subKriteria::where('id_data_kriteria', 18)->get();
        $dtks = subKriteria::where('id_data_kriteria', 19)->get();
        return view('penilaian.edit', compact(
            'datadtks',
            'datapenerangan',
            'datapendidikan',
            'datakondisiRumah',
            'datapekerjaan',
            'datapendapatan',
            'dataKepemilikanRumah',
            'datatanggungan',
            'modul',
            'pmks',
            'kepemilikanRumah',
            'tanggungan',
            'dtks',
            'pendapatan',
            'pekerjaan',
            'kondisiRumah',
            'pendidikan',
            'penerangan',
            'data'
        ));
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'id_pmks' => 'required',
            'id_sub_kepemilikan_rumah' => 'required',
            'id_sub_tanggungan' => 'required',
            'id_sun_dtks' => 'required',
            'id_sub_pendapatan' => 'required',
            'id_sub_pekerjaan' => 'required',
            'id_sub_kondisi_rumah' => 'required',
            'id_sub_pendidikan' => 'required',
            'id_sub_penerangan' => 'required',


        ]);

        $post = Penilaian::create([
            'id_pmks' => $request->id_pmks,
            'id_sub_kepemilikan_rumah' => $request->id_sub_kepemilikan_rumah,
            'id_sub_tanggungan' => $request->id_sub_tanggungan,
            'id_sun_dtks' => $request->id_sun_dtks,
            'id_sub_pendapatan' => $request->id_sub_pendapatan,
            'id_sub_pekerjaan' => $request->id_sub_pekerjaan,
            'id_sub_kondisi_rumah' => $request->id_sub_kondisi_rumah,
            'id_sub_pendidikan' => $request->id_sub_pendidikan,
            'id_sub_penerangan' => $request->id_sub_penerangan,
        ]);

        if ($post) {
            return redirect()
                ->route('penilaian.index')
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
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'id_pmks' => 'required',
            'id_sub_kepemilikan_rumah' => 'required',
            'id_sub_tanggungan' => 'required',
            'id_sun_dtks' => 'required',
            'id_sub_pendapatan' => 'required',
            'id_sub_pekerjaan' => 'required',
            'id_sub_kondisi_rumah' => 'required',
            'id_sub_pendidikan' => 'required',
            'id_sub_penerangan' => 'required'


        ]);

        $post = Penilaian::findOrFail($id);

        $post->update([

            'id_pmks' => $request->id_pmks,
            'id_sub_kepemilikan_rumah' => $request->id_sub_kepemilikan_rumah,
            'id_sub_tanggungan' => $request->id_sub_tanggungan,
            'id_sun_dtks' => $request->id_sun_dtks,
            'id_sub_pendapatan' => $request->id_sub_pendapatan,
            'id_sub_pekerjaan' => $request->id_sub_pekerjaan,
            'id_sub_kondisi_rumah' => $request->id_sub_kondisi_rumah,
            'id_sub_pendidikan' => $request->id_sub_pendidikan,
            'id_sub_penerangan' => $request->id_sub_penerangan,
        ]);

        if ($post) {
            return redirect()
                ->route('penilaian.index')
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
    public function destroy(Request $request, $id)
    {
        $post = Penilaian::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('penilaian.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('penilaian.index')
                ->with([
                    'error' => 'Terjadi Kesalahan, Coba Lagi'

                ]);
        }
    }
}
