<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaMatkulController extends Controller
{
    public function  update (Request $request, $id)
    {
        $mahasiswa_matkul = \App\Models\MahasiswaMatkul::find($id);
        $mahasiswa_matkul -> update($request ->all());
        return redirect ("/mahasiswa/$mahasiswa_matkul->mahasiswa_id/profile")->with('sukses','Data berhasil diupdate!');
    }
}
