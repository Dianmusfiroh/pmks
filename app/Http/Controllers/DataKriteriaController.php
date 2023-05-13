<?php

namespace App\Http\Controllers;

use App\Models\DataKriteria;
use Illuminate\Http\Request;

class DataKriteriaController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'dataKriteria';
    }
    public function index()
    {
        $modul = $this->modul;
        $data = DataKriteria::all();
        return view('dataKriteria.index', compact('modul', 'data'));
    }
    public function edit(Request $request,$id)
    {
        $data = DataKriteria::find($id);
        $modul = $this->modul;
        return view('dataKriteria.edit', compact('modul','data'));
    }
    public function create()
    {
        $modul = $this->modul;
        return view('dataKriteria.add',compact('modul'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_kriteria' => 'required',
            'nama_kriteria' => 'required',
            'value'=>'required',
            'jenis'=>'required',
        ]);
        $post = DataKriteria::findOrFail($id);

        $post->update([
            'kode_kriteria' => $request->kode_kriteria,
            'nama_kriteria' => $request->nama_kriteria,
            'value' => $request->value,
            'jenis' => $request->jenis,
        ]);

        if ($post) {
            return redirect()
                ->route('dataKriteria.index')
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
    public function store(Request $request )
    {
        $this->validate($request, [
            'kode_kriteria' => 'required',
            'nama_kriteria' => 'required',
            'value'=>'required',
            'jenis'=>'required',

        ]);
        $post = DataKriteria::create([
            'kode_kriteria' => $request->kode_kriteria,
            'nama_kriteria' => $request->nama_kriteria,
            'value' => $request->value,
            'jenis' => $request->jenis,


        ]);

        if ($post) {
            return redirect()
                ->route('dataKriteria.index')
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
    public function destroy(Request $request,$id)
    {
        $post = DataKriteria::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('dataKriteria.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('adltransfer.index')
                ->with([
                    'error' => 'Terjadi Kesalahan, Coba Lagi'

                ]);
        }
    }
}
