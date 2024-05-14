<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\MahasiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;



class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request -> has('cari')){
            $data_mahasiswa =\App\Models\Mahasiswa:: where('nama_lengkap','LIKE','%'.$request -> cari.'%')->get();
        }else{
            $data_mahasiswa = \App\Models\Mahasiswa::all();
        }
       
        return view('mahasiswa.index',[
            'data_mahasiswa' => $data_mahasiswa ]);
      
    }
    public function create (Request $request)
    {
        //return $request -> all();
        //dd($request-> all());
        $this->validate($request, [
            'nim' => 'required|min:10',
            'email' => 'required|email',
            'nama_lengkap'=> 'required',
            'ttl'=>'required',
            'jenis_kelamin'=> 'required',
            'jurusan'=>'required',
            'alamat'=>'required',
            'avatar'=> 'mimes:jpg,png',
            
           

        ]);
        //insert ke user mahasiswa
        $user = new \App\Models\User;
        $user -> role ='mahasiswa';
        $user->name = $request->nama_lengkap;
        $user->email = $request->email;
        $user->password = bcrypt('12345');
        $user->remember_token = 'str_random(60)';
        $user->save();
        
        
        //insert ke table mahasiswa
        $request->request->add(['user_id' => $user->id]);
        $mahasiswa = \App\Models\Mahasiswa::create ($request -> all());
        if($request -> hasFile('avatar')){
            $request -> file ('avatar') -> move ('images/', $request -> file ('avatar') -> getClientOriginalName());
            $mahasiswa -> avatar = $request -> file ('avatar') -> getClientOriginalName();
            $mahasiswa -> save();
        }
        return redirect ('/mahasiswa')->with('sukses','Data berhasil diinput!');

        
    }
    public function edit($id)
    {
        $mahasiswa = \App\Models\Mahasiswa::find($id);
        return view('mahasiswa/edit',['mahasiswa'=> $mahasiswa]);

    }

    public function  update (Request $request, $id)
    {
        //dd($request ->all());
        $mahasiswa = \App\Models\Mahasiswa::find($id);
        $mahasiswa -> update($request ->all());
        if($request -> hasFile('avatar')){
            $request -> file ('avatar') -> move ('images/', $request -> file ('avatar') -> getClientOriginalName());
            $mahasiswa -> avatar = $request -> file ('avatar') -> getClientOriginalName();
            $mahasiswa -> save();
        }
        return redirect ('/mahasiswa')->with('sukses','Data berhasil diupdate!');
    }
    public function delete($id)
    {
        $mahasiswa =\App\Models\Mahasiswa::find($id);
        $mahasiswa -> delete($mahasiswa);
        return redirect ('/mahasiswa')->with('sukses','Data berhasil dihapus!');
    }
    public function profile($id)
    {
        $mahasiswa = \App\Models\Mahasiswa::find($id);
        $matakuliah = \App\Models\Matkul::all();
        //dd($matkul);
        //Menyiapkan Data Untuk Chart
        $categories= [];
        $data=[];

        foreach($matakuliah as $mk){
            if($mahasiswa->matkul()->wherePivot('matkul_id', $mk->id)->first()){
            $categories[]=$mk->nama;
            $data[]=$mahasiswa->matkul()->wherePivot('matkul_id', $mk->id)->first()->pivot->nilai;
            //$data[]=$mahasiswa->matkul()->wherePivot('matkul_id', $mk->id)->first()->pivot->nilai_uts;
            //$data[]=$mahasiswa->matkul()->wherePivot('matkul_id', $mk->id)->first()->pivot->nilai_uas;
            }  
        }
        //dd($data);
        //dd(json_encode($categories));
        //dd(json_encode($categories));
        return view('mahasiswa.profile',['mahasiswa'=> $mahasiswa,'matakuliah'=> $matakuliah,'categories'=>$categories,'data'=> $data]);
    }

    public function addnilai(Request $request, $idmahasiswa )
    {
        //dd($request -> all());
        $mahasiswa = \App\Models\Mahasiswa::find($idmahasiswa);
        if($mahasiswa->matkul()->where('matkul_id',$request->matkul)->exists()){
            return redirect('mahasiswa/'.$idmahasiswa. '/profile')->with('error','Data mata kuliah sudah ada!');
        }
        $mahasiswa->matkul()->attach($request -> matkul,['nilai' => $request->nilai, 'nilai_uts'=>$request->nilai_uts, 'nilai_uas'=>$request->nilai_uas,'huruf_mutu'=>$request->huruf_mutu]);
        
        return redirect('mahasiswa/'.$idmahasiswa. '/profile')->with('sukses','Data nilai berhasil dimasukkan!');
    }

    public function editNilai(Request $request, $id, $matkul_kode)
    {
       // dd($id);
      
    $matkulId = \App\Models\Matkul::where('kode', $matkul_kode)->first();
    $nilai = \App\Models\MahasiswaMatkul::where('mahasiswa_id', $id)
    ->where('matkul_id', $matkulId->id)
    ->first();

          $matakuliah = \App\Models\Matkul::all();
         return view('mahasiswa/updatenilai',['nilai'=> $nilai, 'matakuliah'=>$matakuliah]);

    

    }
    public function updatenilai( Request $request)
    {

    }
 

    public function exportExcel() 
    {
        return Excel::download(new MahasiswaExport, 'Mahasiswa.xlsx');
    }
    public function exportPdf() 
    {
       

        $pdf = Pdf::loadHTML("<h1>Data Mahasiswa<h1>");
        return $pdf->download('mahasiswa.pdf');

    }


       
    }


   
    
