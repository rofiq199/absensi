		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav nav-primary">
						<li class="nav-item">
							<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Perkuliahan</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-calendar"></i>
								<p>Jadwal</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?= base_url('dosen/JadwalDos')?>">
											<span class="sub-item">Jadwal Kuliah</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item submenu">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-list"></i>
								<p>Presensi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse show" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?= base_url('admin/DataMahasiswa')?>">
											<span class="sub-item">Mahasiswa</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url('admin/DataDosen')?>">
											<span class="sub-item">Dosen</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url('admin/DataMatkul')?>">
											<span class="sub-item">Matkul</span>
										</a>
									</li>
									<li>
										<a href="../tables/tables.html">
											<span class="sub-item">Basic Table</span>
										</a>
									</li>
									<li>
										<a href="../tables/datatables.html">
											<span class="sub-item">Datatables</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>