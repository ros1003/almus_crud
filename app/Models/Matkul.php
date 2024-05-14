<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;
    protected $table = 'matkul';
    protected $fillable=['kode','nama','semester'];

    public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class)-> withPivot(['nilai','nilai_uts','nilai_uas','huruf_mutu','ip']);
    }
    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
