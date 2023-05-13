<?php

namespace App\Http\Controllers;

use App\Models\AdlMandi;
use App\Models\DataMaster;
use Illuminate\Http\Request;

class AdlMandiController extends Controller
{
    protected $modul;

    public function __construct(){
        $this->modul = 'adlmandi';

    }
    public function index()
    {
        $modul = $this->modul;
       $adlmandi = DataMaster::where('jenis','adl_mandi')->get();
        return view('adlMandi.index',compact('modul','adlmandi'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('adlMandi.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            // 'value'=>'required',

        ]);
        $post = DataMaster::create([
            'name' => $request->name,
            'jenis' => 'adl_mandi',


        ]);

        if ($post) {
            return redirect()
                ->route('adlmandi.index')
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
       $adlmandi = DataMaster::find($id);
        $modul = $this->modul;
        return view('adlMandi.edit', compact('modul','adlmandi'));
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
                ->route('adlmandi.index')
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
                ->route('adlmandi.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('adlmandi.index')
                ->with([
                    'error' => 'Terjadi Kesalahan, Coba Lagi'

                ]);
        }
    }
}
