<?php

namespace App\Http\Controllers;

use App\Models\JenisDisabilitas;
use Illuminate\Http\Request;

class JenisDisabilitasController extends Controller
{
    public function __construct(){
        $this->modul = 'jenisDisabilitas';

    }
    public function index()
    {
        $modul = $this->modul;
        $jenisDisabilitas = JenisDisabilitas::all();
        return view('jenisDisabilitas.index',compact('modul','jenisDisabilitas'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('jenisDisabilitas.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',

        ]);
        $post = JenisDisabilitas::create([
            'name' => $request->name,
            'value' => $request->value,


        ]);

        if ($post) {
            return redirect()
                ->route('jenisDisabilitas.index')
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
        $jenisDisabilitas = JenisDisabilitas::find($id);
        $modul = $this->modul;
        return view('jenisDisabilitas.edit', compact('modul','jenisDisabilitas'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',
        ]);
        // dd($request->kategori_bisnis);
        $post = JenisDisabilitas::findOrFail($id);

        $post->update([
            'name' => $request->name,
            'value' => $request->value,
        ]);

        if ($post) {
            return redirect()
                ->route('jenisDisabilitas.index')
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
        $post = JenisDisabilitas::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('jenisDisabilitas.index')
                ->with([
                    'success' => 'Kategori has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('Kategori.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
