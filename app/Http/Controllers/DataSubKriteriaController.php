<?php

namespace App\Http\Controllers;

use App\Models\DataKriteria;
use App\Models\subKriteria;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class DataSubKriteriaController extends Controller
{
    protected $modul;

    public function __construct()
    {
        $this->modul = 'subDataKriteria';
    }
    public function index()
    {
        $modul = $this->modul;
        $data = DataKriteria::all();
        $sub = subKriteria::paginate(5);
        return view('subKriteria.index', compact('modul', 'data','sub'));
    }
    public function show(Request $request, $id)
    {
        $modul = $this->modul;
        $data = DataKriteria::find($id);
        
        return view('subKriteria.show',compact('modul','data'));
    }
    public function edit(Request $request,$id)
    {
        $dataSub = subKriteria::find($id);
        $data = DataKriteria::find($dataSub->id_data_kriteria);
        $modul = $this->modul;
        return view('subKriteria.edit', compact('modul','data','dataSub'));
    }
    public function store(Request $request){


        $this->validate($request, [
            'id_data_kriteria'  => 'required',
            'nama_sub'  => 'required',
            'nilai'  => 'required',
        ]);
 
        $post = subKriteria::create([
            'id_data_kriteria'  => $request->id_data_kriteria,
            'nama_sub'  => $request->nama_sub,
            'nilai'  => $request->nilai,
        ]);

        if ($post) {
            return redirect()
                ->route('subDataKriteria.index')
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
            'id_data_kriteria'  => 'required',
            'nama_sub'  => 'required',
            'nilai'  => 'required',
        ]);
        $post = subKriteria::findOrFail($id);

        $post->update([
            'id_data_kriteria'  => $request->id_data_kriteria,
            'nama_sub'  => $request->nama_sub,
            'nilai'  => $request->nilai,
        ]);

        if ($post) {
            return redirect()
                ->route('subDataKriteria.index')
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
    public function destroy(Request $request,$id)
    {
        $post = subKriteria::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('subDataKriteria.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('subDataKriteria.index')
                ->with([
                    'error' => 'Terjadi Kesalahan, Coba Lagi'

                ]);
        }
    }

}
