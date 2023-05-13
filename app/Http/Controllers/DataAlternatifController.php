<?php

namespace App\Http\Controllers;

use App\Models\DataAlternatif;
use App\Models\Pmks;
use Illuminate\Http\Request;

class DataAlternatifController extends Controller
{
    protected $modul;
    public function __construct(){
        $this->modul = 'dataAlternatif';

    }
    public function index()
    {
        $modul = $this->modul;
        $data = DataAlternatif::join('t_pmks','t_pmks.id','t_alternatif.id_pmks')
                                ->select('t_alternatif.id AS idAlternatif','t_pmks.*')
                                ->get();
        $pmks = Pmks::where('status','sukses')->get();
        return view('dataAlternatif.index',compact('modul','data','pmks'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'id_pmks' => 'required',

        ]);
        $post = DataAlternatif::create([
            'id_pmks' => $request->id_pmks,


        ]);

        if ($post) {
            return redirect()
                ->route('dataAlternatif.index')
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
        $post = DataAlternatif::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('dataAlternatif.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('dataAlternatif.index')
                ->with([
                    'error' => 'Terjadi Kesalahan, Coba Lagi'

                ]);
        }
    }
}
