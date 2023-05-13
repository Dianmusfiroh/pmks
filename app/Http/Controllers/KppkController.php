<?php

namespace App\Http\Controllers;

use App\Models\DataMaster;
use App\Models\Kppk;
use Illuminate\Http\Request;

class KppkController extends Controller
{
    protected $modul;
    public function __construct(){
        $this->modul = 'kppk';

    }
    public function index()
    {
        $modul = $this->modul;
      $kppk = DataMaster::where('jenis','kppk')->get();
        return view('kppk.index',compact('modul','kppk'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('kppk.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            // 'value'=>'required',

        ]);
        $post = DataMaster::create([
            'name' => $request->name,
            'jenis' => 'kppk',


        ]);

        if ($post) {
            return redirect()
                ->route('kppk.index')
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
      $kppk = DataMaster::find($id);
        $modul = $this->modul;
        return view('kppk.edit', compact('modul','kppk'));
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
                ->route('kppk.index')
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
                ->route('kppk.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('kppk.index')
                ->with([
                    'error' => 'Terjadi Kesalahan, Coba Lagi'

                ]);
        }
    }
}
