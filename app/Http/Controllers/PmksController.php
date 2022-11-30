<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Pmks;

class PmksController extends Controller
{
    public function __construct()
    {
        $this->modul = 'pmks';
    }
    public function index()
    {
        $modul = $this->modul;
        $pmks = Pmks::all();
        $pmksKonfirmasi = Pmks::where('status', 'konfirmasi')->get();
        return view('pmks.index', compact('modul', 'pmks', 'pmksKonfirmasi'));
    }
    public function create()
    {
        $modul = $this->modul;
        return view('pmks.add', compact('modul'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'no_kk' => 'required',
            'nik' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'jenis_kelamin' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'id_dtks' => 'required',
        ]);
        $post = Pmks::create([
            'nama' => $request->nama,
            'no_kk' =>  $request->no_kk,
            'nik' =>  $request->nik,
            'tgl_lahir' =>  $request->tgl_lahir,
            'alamat' =>  $request->alamat,
            'kelurahan' =>  $request->kelurahan,
            'kecamatan' =>  $request->kecamatan,
            'jenis_kelamin' =>  $request->jenis_kelamin,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'status' => 'konfirmasi',
            'id_dtks' => $request->id_dtks,
        ]);

        if ($post) {
            return redirect()
                ->route('pmks.index')
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
    public function edit(Request $request, $id)
    {
        $pmks = Pmks::findOrFail($id);
        $modul = $this->modul;
        return view('pmks.edit', compact('modul', 'pmks'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'no_kk' => 'required',
            'nik' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'jenis_kelamin' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'id_dtks' => 'required',
        ]);
        $post = Pmks::findOrFail($id);

        $post->update([
            'nama' => $request->nama,
            'no_kk' =>  $request->no_kk,
            'nik' =>  $request->nik,
            'tgl_lahir' =>  $request->tgl_lahir,
            'alamat' =>  $request->alamat,
            'kelurahan' =>  $request->kelurahan,
            'kecamatan' =>  $request->kecamatan,
            'jenis_kelamin' =>  $request->jenis_kelamin,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'id_dtks' => $request->id_dtks,
        ]);

        if ($post) {
            return redirect()
                ->route('pmks.index')
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
    public function status(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);

        $post = Pmks::findOrFail($id);

        $post->update([
            'status' => $request->status,
        ]);

        if ($post) {
            return redirect()
                ->route('pmks.index')
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
    public function lihat(Request $request,$id)
    {
        $pmks = Pmks::findOrFail($id);
        $modul = $this->modul;
        return view('pmks.tolak', compact('modul', 'pmks'));
    }
    public function destroy(Request $request, $id)
    {
        $post = Pmks::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('pmks.index')
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
