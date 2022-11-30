<?php

namespace App\Http\Controllers;

use App\Models\AdlPakaian;
use Illuminate\Http\Request;

class AdlPakaianController extends Controller
{
    public function __construct(){
        $this->modul = 'adlpakaian';

    }
    public function index()
    {
        $modul = $this->modul;
       $adlpakaian = AdlPakaian::all();
        return view('adlpakaian.index',compact('modul','adlpakaian'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('adlpakaian.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',

        ]);
        $post = AdlPakaian::create([
            'name' => $request->name,
            'value' => $request->value,


        ]);

        if ($post) {
            return redirect()
                ->route('adlpakaian.index')
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
       $adlpakaian = AdlPakaian::find($id);
        $modul = $this->modul;
        return view('adlpakaian.edit', compact('modul','adlpakaian'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',
        ]);
        // dd($request->kategori_bisnis);
        $post = AdlPakaian::findOrFail($id);

        $post->update([
            'name' => $request->name,
            'value' => $request->value,
        ]);

        if ($post) {
            return redirect()
                ->route('adlpakaian.index')
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
        $post = AdlPakaian::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('adlpakaian.index')
                ->with([
                    'success' => 'Kategori has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('adlpakaian.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
