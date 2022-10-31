<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function __construct(){
        $this->modul = 'score';

    }
    public function index()
    {
        $modul = $this->modul;
      $score = Score::all();
      $scoreCount = Score::count();
        return view('score.index',compact('modul','score','scoreCount'));

    }
    public function create()
    {
        $modul = $this->modul;
        return view('score.add',compact('modul'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'score' => 'required',

        ]);
        $post = Score::create([
            'score' => $request->score,


        ]);

        if ($post) {
            return redirect()
                ->route('score.index')
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
      $score = Score::find($id);
        $modul = $this->modul;
        return view('score.edit', compact('modul','score'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'score' => 'required',
        ]);
        // dd($request->kategori_bisnis);
        $post = Score::findOrFail($id);

        $post->update([
            'score' => $request->score,
        ]);

        if ($post) {
            return redirect()
                ->route('score.index')
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
        $post = Score::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('score.index')
                ->with([
                    'success' => 'Kategori has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('score.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }}
