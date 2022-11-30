<?php

namespace App\Http\Controllers;

use App\Models\AdlMakan;
use Illuminate\Http\Request;

class AdlMakanController extends Controller
{
    public function __construct(){
        $this->modul = 'adlmakan';

    }
    public function index()
    {
        $modul = $this->modul;
       $adlmakan = AdlMakan::all();
        return view('adlmakan.index',compact('modul','adlmakan'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('adlmakan.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',

        ]);
        $post = AdlMakan::create([
            'name' => $request->name,
            'value' => $request->value,


        ]);

        if ($post) {
            return redirect()
                ->route('adlmakan.index')
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
       $adlmakan = AdlMakan::find($id);
        $modul = $this->modul;
        return view('adlmakan.edit', compact('modul','adlmakan'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',
        ]);
        // dd($request->kategori_bisnis);
        $post = AdlMakan::findOrFail($id);

        $post->update([
            'name' => $request->name,
            'value' => $request->value,
        ]);

        if ($post) {
            return redirect()
                ->route('adlmakan.index')
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
        $post = AdlMakan::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('adlmakan.index')
                ->with([
                    'success' => 'Kategori has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('adlmakan.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
