<?php

namespace App\Http\Controllers;

use App\Models\AdlMandi;
use Illuminate\Http\Request;

class AdlMandiController extends Controller
{
    public function __construct(){
        $this->modul = 'adlmandi';

    }
    public function index()
    {
        $modul = $this->modul;
       $adlmandi = AdlMandi::all();
        return view('adlMandi.index',compact('modul','adlmandi'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('adlMandi.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',

        ]);
        $post = AdlMandi::create([
            'name' => $request->name,
            'value' => $request->value,


        ]);

        if ($post) {
            return redirect()
                ->route('adlmandi.index')
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
       $adlmandi = AdlMandi::find($id);
        $modul = $this->modul;
        return view('adlMandi.edit', compact('modul','adlmandi'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',
        ]);
        // dd($request->kategori_bisnis);
        $post = AdlMandi::findOrFail($id);

        $post->update([
            'name' => $request->name,
            'value' => $request->value,
        ]);

        if ($post) {
            return redirect()
                ->route('adlmandi.index')
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
        $post = AdlMandi::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('adlmandi.index')
                ->with([
                    'success' => 'Kategori has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('adlmandi.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
