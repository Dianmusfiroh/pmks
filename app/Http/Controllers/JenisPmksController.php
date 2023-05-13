<?php

namespace App\Http\Controllers;

use App\Models\DataMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\JenisPmks;

class JenisPmksController extends Controller
{
    protected $modul;
    public function __construct(){
        $this->modul = 'jenisPmks';

    }
    public function index()
    {
        $modul = $this->modul;
        // $jenisPmks = DB::table('JenisPmks')->get();
        $jenisPmks = DataMaster::where('jenis','jenis_pmks')->get();
        return view('jenisPmks.index',compact('modul','jenisPmks'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('jenisPmks.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            // 'value'=>'required',

        ]);
        $post = DataMaster::create([
            'name' => $request->name,
            'jenis' => 'jenis_pmks',


        ]);

        if ($post) {
            return redirect()
                ->route('jenisPmks.index')
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
        $jenisPmks = DB::table('t_kategori_pmks')->find($id);
        $modul = $this->modul;
        return view('jenisPmks.edit', compact('modul','jenisPmks'));
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
        alert()->success('Good job!')->persistent("Close");

        if ($post) {
            return redirect()
                ->route('jenisPmks.index')
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
                ->route('jenisPmks.index')
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
    }
}
