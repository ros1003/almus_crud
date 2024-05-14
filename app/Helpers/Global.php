<?php

use Illuminate\Database\Eloquent\Model;

function totalMahasiswa()
{
    return App\Models\Mahasiswa::count();
}


function totalDosen()
{
    return App\Models\Dosen::count();
}