<?php

namespace App\Http\Controllers;

use App\Models\AdlTransfer;
use Illuminate\Http\Request;

class AdlTransferController extends Controller
{
    public function __construct(){
        $this->modul = 'adltransfer';

    }
    public function index()
    {
        $modul = $this->modul;
       $adltransfer = AdlTransfer::all();
        return view('adltransfer.index',compact('modul','adltransfer'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('adltransfer.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',

        ]);
        $post = AdlTransfer::create([
            'name' => $request->name,
            'value' => $request->value,


        ]);

        if ($post) {
            return redirect()
                ->route('adltransfer.index')
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
       $adltransfer = AdlTransfer::find($id);
        $modul = $this->modul;
        return view('adltransfer.edit', compact('modul','adltransfer'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',
        ]);
        // dd($request->kategori_bisnis);
        $post = AdlTransfer::findOrFail($id);

        $post->update([
            'name' => $request->name,
            'value' => $request->value,
        ]);

        if ($post) {
            return redirect()
                ->route('adltransfer.index')
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
        $post = AdlTransfer::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('adltransfer.index')
                ->with([
                    'success' => 'Kategori has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('adltransfer.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
