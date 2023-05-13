<?php

namespace App\Http\Controllers;

use App\Models\DataMaster;
use App\Models\SpesificKecacatan;
use Illuminate\Http\Request;

class SpesificKecacatanController extends Controller
{
    protected $modul;
    public function __construct(){
        $this->modul = 'spesificKecacatan';

    }
    public function index()
    {
        $modul = $this->modul;
        $spesificKecacatan = DataMaster::where('jenis','spesific_kecacatan')->get();
        return view('spesificKecacatan.index',compact('modul','spesificKecacatan'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('spesificKecacatan.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            // 'value'=>'required',

        ]);
        $post = DataMaster::create([
            'name' => $request->name,
            'jenis' => 'spesific_kecacatan',


        ]);

        if ($post) {
            return redirect()
                ->route('spesificKecacatan.index')
                ->with([
                   'success' => 'Data Berhasil Dibuat'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                   'error' => 'Terjadi Kesalahan, Coba Lagi'                ]);
        }
    }
    public function edit(Request $request,$id)
    {
        $spesificKecacatan = DataMaster::find($id);
        $modul = $this->modul;
        return view('spesificKecacatan.edit', compact('modul','spesificKecacatan'));
    }
    public function update(Request $request,$id){
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
                ->route('spesificKecacatan.index')
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
    public function destroy(Request $request,$id)
    {
        $post = DataMaster::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('spesificKecacatan.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('spesificKecacatan.index')
                ->with([
                    'error' => 'Terjadi Kesalahan, Coba Lagi'

                ]);
        }
    }
}
