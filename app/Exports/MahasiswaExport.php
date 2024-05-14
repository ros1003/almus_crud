<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MahasiswaExport implements FromCollection,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mahasiswa::all();
    }
    public function map($mahasiswa): array
    {
        return [
           $mahasiswa ->nim,
           $mahasiswa->nama_lengkap,
           $mahasiswa->ttl,
           $mahasiswa->jenis_kelamin,
           $mahasiswa->jurusan,
           $mahasiswa->alamat,
           $mahasiswa->RataRataNilai(),




        ];
    }
    public function headings(): array
    {
        return [
            'NIM',
            'Nama Lengkap',
            'Tempat tanggal lahir',
            'Jenis Kelamin',
            'Jurusan',
            'Alamat',
            'IPK',
        ];
    }
}
