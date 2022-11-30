<?php

namespace App\Http\Controllers;

use App\Models\DataKriteria;
use Illuminate\Http\Request;

class DataKriteriaController extends Controller
{
    public function __construct()
    {
        $this->modul = 'dataKriteria';
    }
    public function index()
    {
        $modul = $this->modul;
        $data = DataKriteria::all();
        return view('dataKriteria.index', compact('modul', 'data'));
    }
    public function create()
    {
        $modul = $this->modul;
        return view('dataKriteria.add',compact('modul'));
    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'nama_kriteria' => 'required',
            'value'=>'required',
            'alias'=>'required',

        ]);
        $post = DataKriteria::create([
            'nama_kriteria' => $request->nama_kriteria,
            'value' => $request->value,
            'alias' => $request->alias,


        ]);

        if ($post) {
            return redirect()
                ->route('dataKriteria.index')
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
    public function destroy(Request $request,$id)
    {
        $post = DataKriteria::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('dataKriteria.index')
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
