<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonPenerima;
use RealRashid\SweetAlert\Facades\Alert;

class CalonPenrimaController extends Controller
{
    public function __construct(){
        $this->modul = 'calonPenerima';

    }
    public function index()
    {
        $modul = $this->modul;
        $calonPenerima = CalonPenerima::all();
        return view('calonPenerima.index',compact('modul','calonPenerima'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('calonPenerima.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'jenis_pmks' => 'required',
            'nama'=>'required',
            'jenis_bantuan'=>'required',

        ]);
        $post = CalonPenerima::create([
            'jenis_pmks' => $request->jenis_pmks,
            'nama' => $request->nama,
            'jenis_bantuan' =>  $request->jenis_bantuan,


        ]);

        if ($post) {
            return redirect()
                ->route('calonPenerima.index')
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
        $CalonPenerima = CalonPenerima::findOrFail($id);
        $modul = $this->modul;
        return view('calonPenerima.edit', compact('modul','CalonPenerima'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'jenis_pmks' => 'required',
            'nama'=>'required',
            'jenis_bantuan'=>'required',
        ]);
        // dd($request->kategori_bisnis);
        $post = calonPenerima::findOrFail($id);

        $post->update([
            'jenis_pmks' => $request->jenis_pmks,
            'nama' => $request->nama,
            'jenis_bantuan' =>  $request->jenis_bantuan,
        ]);

        if ($post) {
            return redirect()
                ->route('calonPenerima.index')
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
        $post = calonPenerima::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('calonPenerima.index')
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
