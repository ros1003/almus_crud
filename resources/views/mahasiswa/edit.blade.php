@extends('layouts.master')

@section('content')

<div class="main">
      <div class="main-content">
        <div class="container-fluid">
          <div class="row">
            <div class ="col-md-12">
            <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"> Edit Mahasiswa</h3>
								</div>
								<div class="panel-body">
                                <form  method ="POST" action ="/mahasiswa/{{$mahasiswa->id}}/update" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">NIM</label>
                                    <input name= "nim"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIM" value=" {{$mahasiswa -> nim}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">NAMA LENGKAP</label>
                                <input name="nama_lengkap"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NAMA LENGKAP" value="{{$mahasiswa -> nama_lengkap}}" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Tempat Tanggal Lahir</label>
                                <input name="ttl"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tempat Tanggal Lahir" value ="{{$mahasiswa -> ttl}}">
                            </div>
                            <div class="form-group">
                                <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                                <option selected>JENIS KELAMIN</option>
                                <option value="LAKI-LAKI"@if($mahasiswa -> jenis_kelamin == 'LAKI-LAKI') selected @endif>LAKI-LAKI</option>
                                <option value="PEREMPUAN"@if($mahasiswa -> jenis_kelamin == 'PEREMPUAN') selected @endif>PEREMPUAN</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-select" aria-label="Default select example" name="jurusan">
                                <option selected>JURUSAN</option>
                                <option value="PENDIDIKAN AGAMA ISLAM"@if($mahasiswa -> jurusan == 'PENDIDIKAN AGAMA ISLAM') selected @endif>PENDIDIKAN AGAMA ISLAM</option>
                                <option value="HUKUM EKONOMI SYARIAH"@if($mahasiswa -> jurusan == 'HUKUM EKONOMI SYARIAH') selected @endif>HUKUM EKONOMI SYARIAH</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="floatingTextarea2">ALAMAT</label>
                                <textarea name="alamat" class="form-control" placeholder="alamat"id="floatingTextarea2" style="height: 100px">{{$mahasiswa ->alamat}}</textarea>
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="floatingTextarea2">Avatar</label>
                                <input type= "file" name = "avatar" class="form-control">
                            </div>
                            </div>
                            
                            <button type="submit" class="btn btn-warning">Update</button>            
                       </form>
					</div>
	      		</div>
            </div>
          </div>
        </div>
      </div>
</div>

@endsection