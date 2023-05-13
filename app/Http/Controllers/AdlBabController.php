<?php

namespace App\Http\Controllers;

use App\Models\AdlBab;
use App\Models\DataMaster;
use Illuminate\Http\Request;

class AdlBabController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'adlbab';
    }
    public function index()
    {
        $modul = $this->modul;
        $adlbab = DataMaster::where('jenis','adl_bab')->get();
        return view('adlbab.index', compact('modul', 'adlbab'));
    }
    public function create()
    {
        $modul = $this->modul;
        return view('adlbab.add', compact('modul'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            // 'value'=>'required',

        ]);
        $post = DataMaster::create([
            'name' => $request->name,
            'jenis' => 'adl_bab',


        ]);

        if ($post) {
            return redirect()
                ->route('adlbab.index')
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
        $adlbab = DataMaster::find($id);
        $modul = $this->modul;
        return view('adlbab.edit', compact('modul', 'adlbab'));
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
                ->route('adlbab.index')
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
                ->route('adlbab.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('adlbab.index')
                ->with([
                    'error' => 'Terjadi Kesalahan, Coba Lagi'

                ]);
        }
    }
}
