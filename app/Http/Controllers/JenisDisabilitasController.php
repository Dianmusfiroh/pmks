<?php

namespace App\Http\Controllers;

use App\Models\JenisDisabilitas;
use Illuminate\Http\Request;
Use Alert;
use App\Models\DataMaster;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class JenisDisabilitasController extends Controller
{
    protected $modul;
    public function __construct(){
        $this->modul = 'jenisDisabilitas';

    }
    public function index()
    {
        $modul = $this->modul;
        $jenisDisabilitas = DataMaster::where('jenis','jenis_disabilitas')->get();
        // $jenisDisabilitas = JenisDisabilitas::all();
        return view('jenisDisabilitas.index',compact('modul','jenisDisabilitas'));

    }
    public function create()
    {

        $modul = $this->modul;
        return view('jenisDisabilitas.add',compact('modul'));

    }

    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            // 'value'=>'required',

        ]);
        $post = DataMaster::create([
            'name' => $request->name,
            'jenis' => 'jenis_disabilitas',
        ]);

        if ($post) {
            return redirect()
                ->route('jenisDisabilitas.index')
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
    public function edit(Request $request,$id)
    {
        $jenisDisabilitas = DataMaster::find($id);
        $modul = $this->modul;
        return view('jenisDisabilitas.edit', compact('modul','jenisDisabilitas'));
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
                ->route('jenisDisabilitas.index')
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
                ->route('jenisDisabilitas.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('jenisDisabilitas.index')
                ->with([
                    'error' => 'Terjadi Kesalahan, Coba Lagi'
                ]);
        }
    }
}
