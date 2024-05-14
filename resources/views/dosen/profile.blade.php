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
			<div class="panel panel-profile">
			<div class="clearfix">
					<!-- LEFT COLUMN -->
					<div class="profile-left">
						<!-- PROFILE HEADER -->
						<div class="profile-header">
							<div class="overlay"></div>
							<div class="profile-main">
								<img src="" class="img-circle" alt="Avatar">
								<h3 class="name">{{$dosen->nama}}</h3>
								<span class="online-status status-available">Available</span>
							</div>
							
							</div>
						</div>
						<!-- END PROFILE HEADER -->
						<!-- PROFILE DETAIL -->
						
						<!-- END PROFILE DETAIL -->
					
					<!-- END LEFT COLUMN -->
					<!-- RIGHT COLUMN -->


					<div class="profile-right">
						<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
							Tambah Nilai
						</button> -->

						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Mata Kuliah Yang Diajar {{$dosen->nama}}</h3>
							</div>
							<div class="panel-body">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>KODE</th>
											<th>NAMA</th>
											<th>SEMESTER</th>
											
											
										</tr>
									</thead>
									<tbody>
									@foreach($dosen->matkul as $matkul)
										<tr>
											<td>{{$matkul->kode}}</td>
											<td>{{$matkul->nama}}</td>
											<td>{{$matkul->semester}}</td>
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

<!-- modal 1 -->

	</div>
  </div>
</div>

	
@stop
