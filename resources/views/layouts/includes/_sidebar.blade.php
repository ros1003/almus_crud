<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="/dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						@if(auth()->user()-> role == 'admin')
						<li><a href="/mahasiswa" class=""><i class="lnr lnr-user"></i> <span>Mahasiswa</span></a></li>
						<li><a href="/dosen" class=""><i class="lnr lnr-user"></i> <span>Dosen</span></a></li>
						<li>
						<a href="#subPages" data-toggle="collapse" class="collapsed" aria-expanded="false"><i class="lnr lnr-file-empty"></i> <span>Jurusan</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
						<div id="subPages" class="collapse" aria-expanded="false" style="height: 0px;">
								<ul class="nav">
									<li><a href="page-profile.html" class="">PAI</a></li>
									<li><a href="page-login.html" class="">HES</a></li>
									
								</ul>
							</div>
					</a>

						@endif
					</ul>
				</nav>
			</div>
		</div>