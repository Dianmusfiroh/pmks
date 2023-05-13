<?php

namespace App\Http\Controllers;

use App\Models\AdlTransfer;
use App\Models\DataMaster;
use Illuminate\Http\Request;

class AdlTransferController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'adltransfer';
    }
    public function index()
    {
        $modul = $this->modul;
        $adltransfer = DataMaster::where('jenis','adl_transfer')->get();
        return view('adltransfer.index', compact('modul', 'adltransfer'));
    }
    public function create()
    {
        $modul = $this->modul;
        return view('adltransfer.add', compact('modul'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            // 'value'=>'required',

        ]);
        $post = DataMaster::create([
            'name' => $request->name,
            'jenis' => 'adl_transfer',


        ]);

        if ($post) {
            return redirect()
                ->route('adltransfer.index')
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
    public function edit(Request $request, $id)
    {
        $adltransfer = DataMaster::find($id);
        $modul = $this->modul;
        return view('adltransfer.edit', compact('modul', 'adltransfer'));
    }
    public function update(Request $request, $id)
    {
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
                ->route('adltransfer.index')
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
    public function destroy(Request $request, $id)
    {
        $post = DataMaster::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('adltransfer.index')
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
