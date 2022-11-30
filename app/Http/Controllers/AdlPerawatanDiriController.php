<?php

namespace App\Http\Controllers;

use App\Models\AdlPerawatanDiri;
use Illuminate\Http\Request;

class AdlPerawatanDiriController extends Controller
{
    public function __construct(){
        $this->modul = 'adlPerawatanDiri';

    }
    public function index()
    {
        $modul = $this->modul;
       $adlPerawatanDiri = AdlPerawatanDiri::all();
        return view('adlPerawatanDiri.index',compact('modul','adlPerawatanDiri'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('adlPerawatanDiri.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',

        ]);
        $post = AdlPerawatanDiri::create([
            'name' => $request->name,
            'value' => $request->value,


        ]);

        if ($post) {
            return redirect()
                ->route('adlPerawatanDiri.index')
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
       $adlPerawatanDiri = AdlPerawatanDiri::find($id);
        $modul = $this->modul;
        return view('adlPerawatanDiri.edit', compact('modul','adlPerawatanDiri'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',
        ]);
        // dd($request->kategori_bisnis);
        $post = AdlPerawatanDiri::findOrFail($id);

        $post->update([
            'name' => $request->name,
            'value' => $request->value,
        ]);

        if ($post) {
            return redirect()
                ->route('adlPerawatanDiri.index')
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
        $post = AdlPerawatanDiri::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('adlPerawatanDiri.index')
                ->with([
                    'success' => 'Kategori has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('adlPerawatanDiri.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }}
