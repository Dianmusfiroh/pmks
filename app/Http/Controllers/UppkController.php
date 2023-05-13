<?php

namespace App\Http\Controllers;

use App\Models\DataMaster;
use App\Models\Uppk;
use Illuminate\Http\Request;

class UppkController extends Controller
{
    protected $modul;
    public function __construct(){
        $this->modul = 'uppk';

    }
    public function index()
    {
        $modul = $this->modul;
      $uppk = DataMaster::where('jenis','uppk')->get();
        return view('uppk.index',compact('modul','uppk'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('uppk.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            // 'value'=>'required',

        ]);
        $post = DataMaster::create([
            'name' => $request->name,
            'jenis' => 'uppk',


        ]);

        if ($post) {
            return redirect()
                ->route('uppk.index')
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
      $uppk = DataMaster::find($id);
        $modul = $this->modul;
        return view('uppk.edit', compact('modul','uppk'));
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
                ->route('uppk.index')
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
                ->route('uppk.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('uppk.index')
                ->with([
                    'error' => 'Terjadi Kesalahan, Coba Lagi'

                ]);
        }
    }
}
