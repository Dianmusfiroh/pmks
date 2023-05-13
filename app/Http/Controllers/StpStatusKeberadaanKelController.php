<?php

namespace App\Http\Controllers;

use App\Models\DataMaster;
use App\Models\StpStatusKeberadaanKel;
use Illuminate\Http\Request;

class StpStatusKeberadaanKelController extends Controller
{
    protected $modul;
    public function __construct(){
        $this->modul = 'StatusKeberadaanKeluarga';

    }
    public function index()
    {
        $modul = $this->modul;
        $StatusKeberadaanKeluarga = DataMaster::where('jenis','status_keberadaan_keluarga')->get();
        return view('statusKeberadaan.index',compact('modul','StatusKeberadaanKeluarga'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('statusKeberadaan.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            // 'value'=>'required',

        ]);
        $post = DataMaster::create([
            'name' => $request->name,
            'jenis' => 'status_keberadaan_keluarga',


        ]);

        if ($post) {
            return redirect()
                ->route('StatusKeberadaanKeluarga.index')
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
        $StatusKeberadaanKeluarga = DataMaster::find($id);
        $modul = $this->modul;
        return view('statusKeberadaan.edit', compact('modul','StatusKeberadaanKeluarga'));
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
                ->route('StatusKeberadaanKeluarga.index')
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
                ->route('StatusKeberadaanKeluarga.index')
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
    }}
