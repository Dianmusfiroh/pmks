<?php

namespace App\Http\Controllers;

use App\Models\Kppk;
use Illuminate\Http\Request;

class KppkController extends Controller
{
    public function __construct(){
        $this->modul = 'kppk';

    }
    public function index()
    {
        $modul = $this->modul;
      $kppk = Kppk::all();
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
            'value'=>'required',

        ]);
        $post = Kppk::create([
            'name' => $request->name,
            'value' => $request->value,


        ]);

        if ($post) {
            return redirect()
                ->route('kppk.index')
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
      $kppk = Kppk::find($id);
        $modul = $this->modul;
        return view('kppk.edit', compact('modul','kppk'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',
        ]);
        // dd($request->kategori_bisnis);
        $post = Kppk::findOrFail($id);

        $post->update([
            'name' => $request->name,
            'value' => $request->value,
        ]);

        if ($post) {
            return redirect()
                ->route('kppk.index')
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
        $post = Kppk::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('kppk.index')
                ->with([
                    'success' => 'Kategori has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('kppk.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
