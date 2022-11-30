<?php

namespace App\Http\Controllers;

use App\Models\AdlBab;
use Illuminate\Http\Request;

class AdlBabController extends Controller
{
    public function __construct(){
        $this->modul = 'adlbab';

    }
    public function index()
    {
        $modul = $this->modul;
       $adlbab = AdlBab::all();
        return view('adlbab.index',compact('modul','adlbab'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('adlbab.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',

        ]);
        $post = AdlBab::create([
            'name' => $request->name,
            'value' => $request->value,


        ]);

        if ($post) {
            return redirect()
                ->route('adlbab.index')
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
       $adlbab = AdlBab::find($id);
        $modul = $this->modul;
        return view('adlbab.edit', compact('modul','adlbab'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',
        ]);
        // dd($request->kategori_bisnis);
        $post = AdlBab::findOrFail($id);

        $post->update([
            'name' => $request->name,
            'value' => $request->value,
        ]);

        if ($post) {
            return redirect()
                ->route('adlbab.index')
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
        $post = AdlBab::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('adlbab.index')
                ->with([
                    'success' => 'Kategori has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('adlbab.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
