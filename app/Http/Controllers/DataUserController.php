<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\User;
use Illuminate\Http\Request;

class DataUserController extends Controller
{
    protected $modul;
    public function __construct(){
        $this->modul = 'DataUser';

    }
    public function index()
    {
        $modul = $this->modul;
        $user = User::all();
        $kelurahan = Kelurahan::all();
        return view('user.index',compact('modul','user','kelurahan'));

    }
    public function store(Request $request)
    {
        if (empty($request->id_kelurahan)) {
            $this->validate($request, [
    
                'name' => 'required',
                'email' =>'required',
                'role' => 'required',
                'password' => 'required',
            ]);
            $post = User::create([
                'name' => $request->name,
                'email' =>$request->email,
                'role' => $request->role,
                'password' => bcrypt($request->password),
                
            ]);
        } else {
            $this->validate($request, [
    
                'name' => 'required',
                'email' =>'required',
                'role' => 'required',
                'password' => 'required',
                'id_kelurahan' => 'required',
            ]);
            $post = User::create([
                'name' => $request->name,
                'email' =>$request->email,
                'role' => $request->role,
                'password' => bcrypt($request->password),
                'id_kelurahan' => $request->id_kelurahan,
                
            ]);     
       }

        if ($post) {
            return redirect()
                ->route('DataUser.index')
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
    public function destroy(Request $request,$id)
    {
        $post = User::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('DataUser.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('DataUser.index')
                ->with([
                    'error' => 'Terjadi Kesalahan, Coba Lagi'

                ]);
        }
    }
}
