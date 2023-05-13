<?php

namespace App\Http\Controllers;

use App\Models\AdlPerawatanDiri;
use App\Models\DataMaster;
use Illuminate\Http\Request;

class AdlPerawatanDiriController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'adlPerawatanDiri';
    }
    public function index()
    {
        $modul = $this->modul;
        $adlPerawatanDiri = DataMaster::where('jenis','adl_perawatan_diri')->get();
        return view('adlPerawatanDiri.index', compact('modul', 'adlPerawatanDiri'));
    }
    public function create()
    {
        $modul = $this->modul;
        return view('adlPerawatanDiri.add', compact('modul'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            // 'value'=>'required',

        ]);
        $post = DataMaster::create([
            'name' => $request->name,
            'jenis' => 'adl_perawatan_diri',


        ]);

        if ($post) {
            return redirect()
                ->route('adlPerawatanDiri.index')
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
        $adlPerawatanDiri = DataMaster::find($id);
        $modul = $this->modul;
        return view('adlPerawatanDiri.edit', compact('modul', 'adlPerawatanDiri'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            // 'value'=>'required',
        ]);
        // dd($request->kategori_bisnis);
        $post = DataMaster::findOrFail($id);

        $post->update([
            'name' => $request->name,
            // 'value' => $request->value,
        ]);

        if ($post) {
            return redirect()
                ->route('adlPerawatanDiri.index')
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

    public function show(Request $request)
    {
        # code...
    }
    public function destroy(Request $request, $id)
    {
        $post = DataMaster::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('adlPerawatanDiri.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('adlPerawatanDiri.index')
                ->with([
                    'error' => 'Terjadi Kesalahan, Coba Lagi'

                ]);
        }
    }
}
