@extends('layouts.master')

@section('content')

<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
					<div class="panel-body">
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title"> Selamat Datang </h3>
							<p class="panel-subtitle"></p>
						</div>
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-user"></i></span>
										<p>
											<span class="number">{{totalMahasiswa()}}</span>
											<span class="title"> Total Mahasiswa</span>

										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-graduation-cap"></i></span>
										<p>
											<span class="number">2</span>
											<span class="title">Jurusan</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-user"></i></span>
										<p>
											<span class="number">{{totalDosen()}}</span>
											<span class="title">Dosen</span>
										</p>
									</div>
								</div>
								</div>
							</div>
						</div>
								</div>
				</div>
</div>

                                      
@stop