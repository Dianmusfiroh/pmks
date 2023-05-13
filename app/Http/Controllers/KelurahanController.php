<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    protected $modul;

    public function __construct()
    {
    $this->modul = 'kelurahan';
    }
    public function index()
    {
        $modul = $this->modul;
        $data = Kelurahan::join('t_kecamatan', 't_kecamatan.id', 't_kelurahan.id_kecamatan')
            ->select('t_kelurahan.*', 't_kecamatan.nama_kecamatan')
            ->get();

        return view('kelurahan.index', compact('modul', 'data'));
    }
    public function create()
    {
        $modul = $this->modul;
        $kecamatan = Kecamatan::all();
        return view('kelurahan.add', compact('modul', 'kecamatan'));
    }

    public function edit($id)
    {
        $modul = $this->modul;
        $kelurahan = Kelurahan::findOrFail($id);
        // dd($kelurahan->Kecamatan[0]->nama_kecamatan);
        // $kelurahan = Kelurahan::join('t_kecamatan','t_kecamatan.id','t_kelurahan.id_kecamatan')
        // ->where('t_kelurahan.id',$id);

        $kecamatan = Kecamatan::all();
        return view('kelurahan.edit', compact('modul', 'kecamatan', 'kelurahan'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'kelurahan' => 'required',
            'id_kecamatan' => 'required',
            'id' => 'required',

        ]);
        $post = Kelurahan::create([
            'kelurahan' => $request->kelurahan,
            'id_kecamatan' => $request->id_kecamatan,
            'id' => $request->id,


        ]);

        if ($post) {
            return redirect()
                ->route('kelurahan.index')
                ->with([
                    'success' => 'Data Berhasil Dibuat'
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kelurahan' => 'required',
            'id_kecamatan' => 'required',
            'id' => 'required',

        ]);
        $post = Kelurahan::findOrFail($id);

        $post->update([
            'kelurahan' => $request->kelurahan,
            'id_kecamatan' => $request->id_kecamatan,
            'id' => $request->id,
        ]);


        if ($post) {
            return redirect()
                ->route('kelurahan.index')
                ->with([
                    'success' => 'Data Berhasil Dibuat'
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
    public function destroy(Request $request, $id)
    {
        $post = Kelurahan::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('kelurahan.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('adltransfer.index')
                ->with([
                    'error' => 'Terjadi Kesalahan, Coba Lagi'

                ]);
        }
    }
}
