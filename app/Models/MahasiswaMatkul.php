<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaMatkul extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa_matkul';
    protected $fillable=['mahasiswa_id', 'matku_id', 'nilai', 'nilai_uts', 'nilai_uas','huruf_mutu'];

    public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class)-> withPivot(['nilai','nilai_uts','huruf_mutu']);
    }
}

