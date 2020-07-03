<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Jadwal Mahasiswa</h4>
					</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Jadwal Mahasiswa</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="table-responsive" >
											<thead>
												<tr>
													<th>No</th>
													<th>Hari</th>
													<th>Matkul</th>
													<th>Jam</th>
													<th>Dosen</th>
													<th style="width: 10%">Ruangan</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												$no=1;
												foreach ($jadwal as $c) {
												?>
												<tr>
													<td><?=$no++?></td>
													<td><?= $c->nama_hari?></td>
													<td><?= $c->nama_matkul ?></td>
													<td><?= $c->waktu_mulai ?>-<?= $c->waktu_selesai ?></td>
													<td><?= $c->nama_dosen ?></td>
													<td><?= $c->ruangan ?></td>
												</tr>
												<?php }?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>