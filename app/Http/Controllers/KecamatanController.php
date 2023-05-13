<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
// use RealRashid\SweetAlert\Facades\Alert;
Use Alert;
use App\Models\Kelurahan;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
    protected $modul;
    public function __construct(){
        $this->modul = 'kecamatan';

    }
    public function index()
    {
        $modul = $this->modul;
        $kecamatan = Kecamatan::all();
        return view('kecamatan.index',compact('modul','kecamatan'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('kecamatan.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'id' => 'required',
            'nama_kecamatan' => 'required',

        ]);
        $post = Kecamatan::create([
            'id' => $request->id,
            'nama_kecamatan' => $request->nama_kecamatan,


        ]);

        if ($post) {
            return redirect('kecamatan')->with('success', 'Task Created Successfully!');

            // return redirect()
            //     ->route('kecamatan.index')
            //     ->with([
            //        'success' => 'Data Berhasil Dibuat'
            //     ]);
        } else {
            return redirect('kecamatan')->with('error', 'Some problem occurred, please try again');

            // return redirect()
            //     ->back()
            //     ->withInput()
            //     ->with([
            //        'error' => 'Terjadi Kesalahan, Coba Lagi'            //     ]);
        }
    }
    public function edit(Request $request,$id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $modul = $this->modul;
        return view('kecamatan.edit', compact('modul','kecamatan'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'id' => 'required',
            'nama_kecamatan' => 'required',
        ]);
        // dd($request->kategori_bisnis);
        $post = Kecamatan::findOrFail($id);

        $post->update([
            'id' => $request->id,
            'nama_kecamatan' => $request->nama_kecamatan,
        ]);

        if ($post) {
            return redirect()
                ->route('kecamatan.index')
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
        $post = Kecamatan::findOrFail($id);
        DB::table('t_kelurahan')->where('id_kecamatan',$id)->delete();
        $post->delete();

        if ($post) {
            return redirect()
                ->route('kecamatan.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('kecamatan.index')
                ->with([
                    'error' => 'Terjadi Kesalahan, Coba Lagi'

                ]);
        }
    }
}
