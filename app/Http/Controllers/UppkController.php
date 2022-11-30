<?php

namespace App\Http\Controllers;

use App\Models\Uppk;
use Illuminate\Http\Request;

class UppkController extends Controller
{
    public function __construct(){
        $this->modul = 'uppk';

    }
    public function index()
    {
        $modul = $this->modul;
      $uppk = Uppk::all();
        return view('uppk.index',compact('modul','uppk'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('uppk.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',

        ]);
        $post = Uppk::create([
            'name' => $request->name,
            'value' => $request->value,


        ]);

        if ($post) {
            return redirect()
                ->route('uppk.index')
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
      $uppk = Uppk::find($id);
        $modul = $this->modul;
        return view('uppk.edit', compact('modul','uppk'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',
        ]);
        // dd($request->kategori_bisnis);
        $post = Uppk::findOrFail($id);

        $post->update([
            'name' => $request->name,
            'value' => $request->value,
        ]);

        if ($post) {
            return redirect()
                ->route('uppk.index')
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
        $post = Uppk::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('uppk.index')
                ->with([
                    'success' => 'Kategori has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('uppk.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
