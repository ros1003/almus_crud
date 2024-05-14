@extends('layouts.master')

@section('content')

<div class="main">
      <div class="main-content">
        <div class="container-fluid">
          <div class="row">
            <div class ="col-md-12">
            <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"> Edit Dosen</h3>
								</div>
								<div class="panel-body">
                                <form  method ="POST" action ="/dosen/{{$dosen->id}}/update" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">NIDN</label>
                                    <input name= "nidn"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIM" value=" {{$dosen-> nidn}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">NAMA</label>
                                    <input name= "nama"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIM" value=" {{$dosen -> nama}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">TEPON</label>
                                    <input name= "telpon"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIM" value=" {{$dosen -> telpon}}">
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