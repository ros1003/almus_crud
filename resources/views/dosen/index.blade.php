@extends('layouts.master')

@section('header')

@stop
@section('content')
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			@if(session('sukses'))
			<div class="alert alert-primary" role="alert">
				{{session('sukses')}}
			</div>
			@endif
			@if(session('error'))
			<div class="alert alert-danger" role="alert">
				{{session('error')}}
			</div>
			@endif
			


					<div class="profile-center">

						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Data Dosen </h3>
								<div class = "right">
								<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
								</div>
                             </div>
							<div class="panel-body">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>NIDN</th>
											<th>NAMA</th>
											<th>TELPON</th>
                                            <th>AKSI<th>
											
											
										</tr>
									</thead>
									<tbody>
									@foreach($data_dosen as $dosen)
										<tr>
											<td><a href="/dosen/{{$dosen->matkul_id}}/profileDosen">{{$dosen->nidn}}</a></td>
											<td><a href="/dosen/{{$dosen->matkul_id}}/profileDosen">{{$dosen->nama}}</a></td>
											<td>{{$dosen->telpon}}</td>
                                            <td> <a href="/dosen/{{$dosen->id}}/edit"class="btn btn-warning btn-sm">Edit</a>
                                            <a href=""class="btn btn-danger btn-sm"onclick= "return confirm('Yakin mau dihapus?')">Delete</a>
                                            </td>
										</tr>
                                        
                                     
									@endforeach
				
									</tbody>
								</table>
							</div>
							<div class="panel">
								<div id="chartNilai">

								</div>
								
							</div>

						</div>


					</div>

					<!-- END TABBED CONTENT -->
				</div>
				<!-- END RIGHT COLUMN -->

			</div>
		</div>
	</div>
</div>
</div>
</div>
<!-- END MAIN CONTENT -->
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<form>
				{{csrf_field()}}	
				<div class="modal-body">
        <div class="form-group " method= "POST "action="/dosen/create">
            <label for="exampleInputEmail1" class="form-label">NIDN</label>
            <input name= "nidn"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIDN" value="{{$dosen->nidn}}">
            
			 <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input name= "nama"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NAMA" value="{{$dosen->nama}}">
             
			 <div class="form-group ">
            <label for="exampleInputEmail1" class="form-label">TELPON</label>
            <input name= "telpon"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="telpon" value="{{$dosen->telpon}}">
             
			</form>
      </div>
	  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div> 
    </div>
  </div>
</div>

	
@stop


	
