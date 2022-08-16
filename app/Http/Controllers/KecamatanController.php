<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
// use RealRashid\SweetAlert\Facades\Alert;
Use Alert;
class KecamatanController extends Controller
{
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
            'nama_kecamatan' => 'required',
            'nama_camat'=>'required',
            'nip'=>'required',

        ]);
        $post = Kecamatan::create([
            'nama_kecamatan' => $request->nama_kecamatan,
            'nama_camat' => $request->nama_camat,
            'nip' =>  $request->nip,


        ]);

        if ($post) {
            return redirect('kecamatan')->with('success', 'Task Created Successfully!');

            // return redirect()
            //     ->route('kecamatan.index')
            //     ->with([
            //         'success' => 'New post has been created successfully'
            //     ]);
        } else {
            return redirect('kecamatan')->with('error', 'Some problem occurred, please try again');

            // return redirect()
            //     ->back()
            //     ->withInput()
            //     ->with([
            //         'error' => 'Some problem occurred, please try again'
            //     ]);
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
            'nama_kecamatan' => 'required',
            'nama_camat'=>'required',
            'nip'=>'required',
        ]);
        // dd($request->kategori_bisnis);
        $post = Kecamatan::findOrFail($id);

        $post->update([
            'nama_kecamatan' => $request->nama_kecamatan,
            'nama_camat' => $request->nama_camat,
            'nip' =>  $request->nip,
        ]);

        if ($post) {
            return redirect()
                ->route('kecamatan.index')
                ->with([
                    'success' => 'Calon Penerima Berhasil Diupdate'
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
        $post->delete();

        if ($post) {
            return redirect()
                ->route('kecamatan.index')
                ->with([
                    'success' => 'Kategori has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('kecamatan.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
