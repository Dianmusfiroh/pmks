<?php

namespace App\Http\Controllers;

use App\Models\DataMaster;
use App\Models\StpStatusRumah;
use Illuminate\Http\Request;

class StpStatusRumahController extends Controller
{
    protected $modul;
    public function __construct(){
        $this->modul = 'StatusRumah';

    }
    public function index()
    {
        $modul = $this->modul;
        $StatusRumah = DataMaster::where('jenis','status_rumah')->get();
        return view('statusRumah.index',compact('modul','StatusRumah'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('statusRumah.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            // 'value'=>'required',

        ]);
        $post = DataMaster::create([
            'name' => $request->name,
            'jenis' => 'status_rumah',


        ]);

        if ($post) {
            return redirect()
                ->route('StatusRumah.index')
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
        $StatusRumah = DataMaster::find($id);
        $modul = $this->modul;
        return view('statusRumah.edit', compact('modul','StatusRumah'));
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
                ->route('StatusRumah.index')
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
                ->route('StatusRumah.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('StatusRumah.index')
                ->with([
                    'error' => 'Terjadi Kesalahan, Coba Lagi'

                ]);
        }
    }}
