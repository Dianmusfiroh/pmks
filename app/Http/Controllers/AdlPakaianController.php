<?php

namespace App\Http\Controllers;

use App\Models\AdlPakaian;
use App\Models\DataMaster;
use Illuminate\Http\Request;

class AdlPakaianController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'adlpakaian';
    }
    public function index()
    {
        $modul = $this->modul;
        $adlpakaian = DataMaster::where('jenis','adl_pakaian')->get();
        return view('adlpakaian.index', compact('modul', 'adlpakaian'));
    }
    public function create()
    {
        $modul = $this->modul;
        return view('adlpakaian.add', compact('modul'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            // 'value'=>'required',

        ]);
        $post = DataMaster::create([
            'name' => $request->name,
            'jenis' => 'adl_pakaian',


        ]);

        if ($post) {
            return redirect()
                ->route('adlpakaian.index')
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
        $adlpakaian = DataMaster::find($id);
        $modul = $this->modul;
        return view('adlpakaian.edit', compact('modul', 'adlpakaian'));
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
                ->route('adlpakaian.index')
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
                ->route('adlpakaian.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('adlpakaian.index')
                ->with([
                    'error' => 'Terjadi Kesalahan, Coba Lagi'

                ]);
        }
    }
}
