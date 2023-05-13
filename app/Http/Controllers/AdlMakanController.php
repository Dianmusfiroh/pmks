<?php

namespace App\Http\Controllers;

use App\Models\AdlMakan;
use App\Models\DataMaster;
use Illuminate\Http\Request;

class AdlMakanController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'adlmakan';
    }
    public function index()
    {
        $modul = $this->modul;
        $adlmakan = DataMaster::where('jenis','adl_makan')->get();
        return view('adlmakan.index', compact('modul', 'adlmakan'));
    }
    public function create()
    {
        $modul = $this->modul;
        return view('adlmakan.add', compact('modul'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            // 'value'=>'required',

        ]);
        $post = DataMaster::create([
            'name' => $request->name,
            'jenis' => 'adl_makan',


        ]);

        if ($post) {
            return redirect()
                ->route('adlmakan.index')
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
        $adlmakan = DataMaster::find($id);
        $modul = $this->modul;
        return view('adlmakan.edit', compact('modul', 'adlmakan'));
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
                ->route('adlmakan.index')
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
                ->route('adlmakan.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('adlmakan.index')
                ->with([
                    'error' => 'Terjadi Kesalahan, Coba Lagi'

                ]);
        }
    }
}
