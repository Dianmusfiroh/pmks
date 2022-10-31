<?php

namespace App\Http\Controllers;

use App\Models\StpStatusKeberadaanKel;
use Illuminate\Http\Request;

class StpStatusKeberadaanKelController extends Controller
{
    public function __construct(){
        $this->modul = 'StatusKeberadaanKeluarga';

    }
    public function index()
    {
        $modul = $this->modul;
        $StatusKeberadaanKeluarga = StpStatusKeberadaanKel::all();
        return view('statusKeberadaan.index',compact('modul','StatusKeberadaanKeluarga'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('statusKeberadaan.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',

        ]);
        $post = StpStatusKeberadaanKel::create([
            'name' => $request->name,
            'value' => $request->value,


        ]);

        if ($post) {
            return redirect()
                ->route('StatusKeberadaanKeluarga.index')
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
        $StatusKeberadaanKeluarga = StpStatusKeberadaanKel::find($id);
        $modul = $this->modul;
        return view('statusKeberadaan.edit', compact('modul','StatusKeberadaanKeluarga'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',
        ]);
        // dd($request->kategori_bisnis);
        $post = StpStatusKeberadaanKel::findOrFail($id);

        $post->update([
            'name' => $request->name,
            'value' => $request->value,
        ]);

        if ($post) {
            return redirect()
                ->route('StatusKeberadaanKeluarga.index')
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
        $post = StpStatusKeberadaanKel::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('StatusKeberadaanKeluarga.index')
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
    }}
