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
								<img src="{{$mahasiswa->getAvatar()}}" class="img-circle" alt="Avatar">
								<h3 class="name">{{$mahasiswa -> nama_lengkap}}</h3>
								<span class="online-status status-available">Available</span>
							</div>
							<div class="profile-stat">
								<div class="row">
									<div class="col-md-4 stat-item">
										{{$mahasiswa->matkul->count()}} <span>Matkul</span>
									</div>
									<div class="col-md-4 stat-item">
										{{$mahasiswa->RataRataNilai()}}<span>IPK</span>
									</div>
									<div class="col-md-4 stat-item">
										{{totalDosen()}} <span>Dosen Pengampu</span>
									</div>
								</div>
							</div>
						</div>
						<!-- END PROFILE HEADER -->
						<!-- PROFILE DETAIL -->
						<div class="profile-detail">
							<div class="profile-info">
								<h4 class="heading">Data Diri</h4>
								<ul class="list-unstyled list-justify">
									<li>Tempat tanggal lahir <span>{{$mahasiswa -> ttl}}</span></li>
									<li>Jenis Kelamin <span>{{$mahasiswa -> jenis_kelamin}}</span></li>
									<li>Jurusan <span>{{$mahasiswa -> jurusan}}</span></li>
									<li>Alamat<span>{{$mahasiswa -> alamat}}</span></li>
								</ul>
							</div>

							<div class="text-center"><a href="/mahasiswa/{{$mahasiswa -> id}}/edit" class="btn btn-warning">Edit Profile</a></div>
						</div>
						<!-- END PROFILE DETAIL -->
					</div>
					<!-- END LEFT COLUMN -->
					<!-- RIGHT COLUMN -->


					<div class="profile-right">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
							Tambah Nilai
						</button>

						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Mata Kuliah</h3>
							</div>
							<div class="panel-body">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>KODE</th>
											<th>NAMA</th>
											<th>SEMESTER</th>
											<th>DOSEN</th>
											<th>TUGAS</th>
											<th>Nilai UTS</th>
											<th> Nilai UAS</th>
											<th>HURUF MUTU</th>
											<th> IP</th>
											<th>AKSI</th>
										</tr>
									</thead>
									<tbody>
										@foreach($mahasiswa->matkul as $matkul)
										<tr>
											<td>{{$matkul->kode}}</td>
											<td>{{$matkul->nama}}</td>
											<td>{{$matkul->semester}}</td>
											<td><a href="/dosen/{{$matkul->dosen_id}}/profile">{{$matkul->dosen->nama}}</a></td>
											<td>{{$matkul->pivot->nilai}}</a></td>
											<td>{{$matkul->pivot->nilai_uts}}</td>
											<td>{{$matkul->pivot->nilai_uas}}</td>
											<td>{{$matkul->pivot->huruf_mutu}}</td>
											<td>{{$mahasiswa->RataRataNilai()}}</td>
											<td><a href="/mahasiswa/{{$mahasiswa->id}}/updatenilai/{{$matkul->kode}}"class="btn btn-warning btn-sm">Edit</a></td>
											</td>
										</tr>
										
										@endforeach
										

									</tbody>
								</table>
							</div>
							<div class="panel">
								<div id="chartNilai">

								</div>
								<!-- <div class="text-left"> -->
									<!-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
										Edit Nilai
									</button> -->
									<!-- <a href="/mahasiswa/{{$mahasiswa->id}}/updatenilai"class="btn btn-warning btn-sm">Edit Nilai</a>
								</div> -->

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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="/mahasiswa/{{$mahasiswa -> id}}/addnilai" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label for="matkul">Mata Kuliah</label>
						<select class="form-control" id="matkul" name="matkul">
							@foreach($matakuliah as $mk)
							<option value="{{$mk->id}}">{{$mk -> nama}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group{{$errors->has('nilai')? 'has-error' : ''}}">
						<label for="exampleInputEmail1" class="form-label">Nilai</label>
						<input name="nilai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai" value="{{old('nilai' )}}">

						<span class="help-block">{{$errors->first('nilai')}}</span>

					</div>
					<div class="form-group{{$errors->has('nilai_uts')? 'has-error' : ''}}">
						<label for="exampleInputEmail1" class="form-label">Nilai UTS</label>
						<input name="nilai_uts" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai UTS" value="{{old('nilai_uts')}}">
						@if($errors->has('nilai_uts'))
						<span class="help-block">{{$errors->first('nilai_uts')}}</span>
						@endif
					</div>
					<div class="form-group {{$errors->has('nilai_uas')? 'has-error' : ''}}">
						<label for="exampleInputEmail1" class="form-label">Nilai UAS</label>
						<input name="nilai_uas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai UAS" value="{{old('nilai_uas')}}">
						@if($errors->has('nilai_uas'))
						<span class="help-block">{{$errors->first('nilai_uas')}}</span>
						@endif
					</div>
					<div class="form-group {{$errors->has('nilai_uas')? 'has-error' : ''}}">
						<label for="exampleInputEmail1" class="form-label">Huruf Mutu</label>
						<input name="huruf_mutu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai UAS" value="{{old('huruf_mutu')}}">
						@if($errors->has('nilai_uas'))
						<span class="help-block">{{$errors->first('nilai_uas')}}</span>
						@endif
					</div>
				
					
				
			</div>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
		</div>
		
	</div>
  </div>
</div>

	
@stop

@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chartNilai', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'Laporan Nilai Mahasiswa',
			align: 'left'
		},
		xAxis: {
			categories: {
				!!json_encode($categories) !!
			},
			crosshair: true,
			accessibility: {
				description: 'Countries'
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Nilai'
			}
		},
		tooltip: {

		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		series: [{
				name: 'Nilai',
				data: {
					!!json_encode($data) !!
				}


			},
			//{
			// name: 'Wheat',
			//data:{!!json_encode($data)!!}
			//}

		]
	});
});

</script>
@stop