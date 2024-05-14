@extends('layouts.master')

@section('content')
<div class="main">
      <div class="main-content">
        <div class="container-fluid">
          <div class="row">
            <div class ="col-md-12">
            <div class="panel">
<form method="POST" action="/mahasiswa_matkul/{{$nilai->id}}" enctype="multipart/form-data">
        {{csrf_field()}}
<div class="modal-header">
<div class="form-group">
 <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Nilai</h1>
 <div class="form-group">
						<label for="matkul">Mata Kuliah</label>
						<select class="form-control" id="matkul" name="matkul">
							@foreach($matakuliah as $mk)
							<option value="{{$mk->id}}">{{$mk -> nama}}</option>
							@endforeach
						</select>
						<div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">TUGAS</label>
                    <input name="nilai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value=" {{$nilai->nilai}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">NILAI UTS</label>
                    <input name="nilai_uts" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value=" {{$nilai-> nilai_uts}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">NILAI UAS</label>
                    <input name="nilai_uas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value=" {{$nilai -> nilai_uas}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">HURUF MUTU</label>
                    <input name="huruf_mutu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value=" {{$nilai -> huruf_mutu}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">IP</label>
                    <input name="ip" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value=" {{$nilai -> ip}}">
                </div>
              


                            
                            <button type="submit" class="btn btn-warning">Update</button>         
                </form>

</div>


@stop

