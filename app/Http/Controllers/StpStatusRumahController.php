<?php

namespace App\Http\Controllers;

use App\Models\StpStatusRumah;
use Illuminate\Http\Request;

class StpStatusRumahController extends Controller
{
    public function __construct(){
        $this->modul = 'StatusRumah';

    }
    public function index()
    {
        $modul = $this->modul;
        $StatusRumah = StpStatusRumah::all();
        return view('statusRumah.index',compact('modul','StatusRumah'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('statusRumah.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',

        ]);
        $post = StpStatusRumah::create([
            'name' => $request->name,
            'value' => $request->value,


        ]);

        if ($post) {
            return redirect()
                ->route('StatusRumah.index')
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
        $StatusRumah = StpStatusRumah::find($id);
        $modul = $this->modul;
        return view('statusRumah.edit', compact('modul','StatusRumah'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'value'=>'required',
        ]);
        // dd($request->kategori_bisnis);
        $post = StpStatusRumah::findOrFail($id);

        $post->update([
            'name' => $request->name,
            'value' => $request->value,
        ]);

        if ($post) {
            return redirect()
                ->route('StatusRumah.index')
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
        $post = StpStatusRumah::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('StatusRumah.index')
                ->with([
                    'success' => 'Kategori has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('StatusRumah.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }}
