<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    protected $modul;
    public function __construct(){
        $this->modul = 'score';

    }
    public function index()
    {
        $modul = $this->modul;
      $score = DB::select("SELECT s.*, dk.nama_kriteria FROM `t_score` s, t_data_kriteria dk WHERE dk.id = s.id_data_kriteria");
      $scoreCount = Score::count();
        // dd($score);
        return view('score.index',compact('modul','score','scoreCount'));

    }
    public function create()
    {
        $modul = $this->modul;
        $dataKriteria = DB::table('t_data_kriteria')->get();

        return view('score.add',compact('modul','dataKriteria'));

    }
    public function store(Request $request )
    {
        $this->validate($request, [
            'id_data_kriteria' => 'required',
            'score' => 'required',

        ]);
        $post = Score::create([
            'id_data_kriteria' => $request->id_data_kriteria,
            'score' => $request->score,


        ]);

        if ($post) {
            return redirect()
                ->route('score.index')
                ->with([
                   'success' => 'Data Berhasil Dibuat'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                   'error' => 'Terjadi Kesalahan, Coba Lagi'                ]);
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
                     'success' => 'Data Berhasil Diupdate'
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
        // dd($post);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('score.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('score.index')
                ->with([
                    'error' => 'Terjadi Kesalahan, Coba Lagi'

                ]);
        }
    }}
