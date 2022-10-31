<?php

namespace App\Http\Controllers;

use App\Models\SpesificKecacatan;
use Illuminate\Http\Request;

class SpesificKecacatanController extends Controller
{
    public function __construct(){
        $this->modul = 'spesificKecacatan';

    }
    public function index()
    {
        $modul = $this->modul;
        $spesificKecacatan = SpesificKecacatan::all();
        return view('spesificKecacatan.index',compact('modul','spesificKecacatan'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('spesificKecacatan.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',

        ]);
        $post = SpesificKecacatan::create([
            'name' => $request->name,
            'value' => $request->value,


        ]);

        if ($post) {
            return redirect()
                ->route('spesificKecacatan.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
    public function edit(Request $request,$id)
    {
        $spesificKecacatan = SpesificKecacatan::find($id);
        $modul = $this->modul;
        return view('spesificKecacatan.edit', compact('modul','spesificKecacatan'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',
        ]);
        // dd($request->kategori_bisnis);
        $post = SpesificKecacatan::findOrFail($id);

        $post->update([
            'name' => $request->name,
            'value' => $request->value,
        ]);

        if ($post) {
            return redirect()
                ->route('spesificKecacatan.index')
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
        $post = SpesificKecacatan::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('spesificKecacatan.index')
                ->with([
                    'success' => 'Kategori has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('spesificKecacatan.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
