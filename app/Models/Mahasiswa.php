<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $fillable=['nim','nama_lengkap','ttl','jenis_kelamin','jurusan','alamat','avatar', 'user_id'];

    public function getAvatar()
    {
        if(!$this->avatar){
            return asset('images/default.jpg');
        }
        return asset('images'.$this->avatar);
    }

    public function matkul()
    {
        return $this->belongsToMany(Matkul::class, 'mahasiswa_matkul')-> withPivot(['nilai','nilai_uts','nilai_uas','huruf_mutu'])->withTimestamps();
    }

    public function mahasiswa_matkul()
    {
        return $this->hasMany(MahasiswaMatkul::class);
    }
    // public function RataRataNilai(Request $request, $id,$matkul_kode)
    // {
    //    // dd($id);
      
    // $matkulId = \App\Models\Matkul::where('kode', $matkul_kode)->first();
    // $nilai = \App\Models\MahasiswaMatkul::where('mahasiswa_id', $id)
    // ->where('matkul_id', $matkulId->id)
    // ->first();

    //       $matakuliah = \App\Models\Matkul::all();
    //      return view('mahasiswa/updatenilai',['nilai'=> $nilai, 'matakuliah'=>$matakuliah]);

    

    // }
    public function RataRataNilai()
    {
        
        $total= 0;
        $hitung = 0;
        foreach($this ->matkul as $matkul){
            
            
            $total + $matkul->pivot->nilai;
             $total = $total + $matkul->pivot->nilai_uts;
             $total = $total + $matkul->pivot->nilai_uas;

            $hitung ++;
            $hitung = $hitung + $matkul->pivot->nilai;
            $hitung = $hitung + $matkul->pivot->nila_uts;
            $hitung = $hitung + $matkul->pivot->nila_uas;

            return round($total/$hitung);
      }
    }
    // 
    // public function RataRataNilai($id)
    // {
    //     switch (RataRataNilai($id)) {
    //         case 'A':
    //             return 4.0;
    //         case 'B':
    //             return 3.0;
    //         case 'C':
    //             return 2.0;
    //         case 'D':
    //             return 1.0;
    //         case 'F':
    //             return 0.0;
    //         default:
    //             return 0.0;
    //     }
    

    }