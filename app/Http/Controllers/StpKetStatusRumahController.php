<?php

namespace App\Http\Controllers;

use App\Models\StpKetStatusRumah;
use Illuminate\Http\Request;

class StpKetStatusRumahController extends Controller
{
    public function __construct(){
        $this->modul = 'KeteranganStatusRumah';

    }
    public function index()
    {
        $modul = $this->modul;
        $KeteranganStatusRumah = StpKetStatusRumah::all();
        return view('keteranganStatusRumah.index',compact('modul','KeteranganStatusRumah'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('keteranganStatusRumah.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',

        ]);
        $post = StpKetStatusRumah::create([
            'name' => $request->name,
            'value' => $request->value,


        ]);

        if ($post) {
            return redirect()
                ->route('KeteranganStatusRumah.index')
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
        $KeteranganStatusRumah = StpKetStatusRumah::find($id);
        $modul = $this->modul;
        return view('keteranganStatusRumah.edit', compact('modul','KeteranganStatusRumah'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',
        ]);
        // dd($request->kategori_bisnis);
        $post = StpKetStatusRumah::findOrFail($id);

        $post->update([
            'name' => $request->name,
            'value' => $request->value,
        ]);

        if ($post) {
            return redirect()
                ->route('KeteranganStatusRumah.index')
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
        $post = StpKetStatusRumah::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('KeteranganStatusRumah.index')
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
