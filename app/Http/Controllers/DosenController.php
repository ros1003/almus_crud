<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function index(Request $request)
    {
        $data_dosen = Dosen::all(); 
        return view('dosen.index', ['data_dosen' => $data_dosen]);
    }

    public function profile($id)
    {
        $dosen = Dosen::find($id);
        return view('dosen.profile',['dosen' => $dosen]);
    }
    public function create(Request $request)
    {
        $dosen= \App\Models\Dosen::create ($request ->all());
        return redirect ('/dosen')->with('sukses','Data berhasil diupdate!');
        
    }
          

        
    public function edit($id)
    {
        $dosen = Dosen::find($id);
        return view('dosen.edit',['dosen'=> $dosen]);

    }
   
    public function  update (Request $request, $id)
     {
        $dosen = Dosen::find($id);
        $dosen ->update($request  ->all());
        return redirect ('/dosen')->with('sukses','Data berhasil diupdate!');
    }
    public function delete($id)
    {
        $dosen =\App\Models\Dosen::find($id);
        $dosen -> delete($dosen);
        return redirect ('/dosen')->with('sukses','Data berhasil dihapus!');
    }

}
