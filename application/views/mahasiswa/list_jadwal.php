<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
					</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Jadwal</h4>
										
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Tambah</span> 
														<span class="fw-light">
															Dosen
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Isi data Dosen dengan benar</p>
													<form action="<?= base_url('admin/dosen/add');?>" method="POST">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>NIP</label>
																	<input type="text" name="nip" class="form-control" placeholder="Masukkan Nip Dosen">
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Nama Dosen</label>
																	<input name="nama_dosen" type="text" class="form-control" placeholder="Masukkan nama Dosen">
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Password Dosen</label>
																	<input name="password_dosen" type="text" class="form-control" placeholder="Masukkan Pass Dosen">
																</div>
															</div>
															<div class="col-sm-12 pr-0">
																<div class="form-group form-group-default">
																<label>Prodi</label>
																<select name="prodi" class="form-control">
																<?php foreach ($prodi as $a ) {
																	echo "<option value='$a->kode_prodi'>$a->nama_prodi</option>" ;
																} ?>
																</select>
																</div>
															</div>
														</div>
												</div>
												<div class="modal-footer no-bd">
													<input type="submit" value="Tambah" class="btn btn-primary">
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
											</div>
											</form>
										</div>
									</div>
									<div class="table-responsive">
										<table id="add-row" class="table-responsive" >
											<thead>
												<tr>
													<th>No</th>
													<th>Matkul</th>
													<th>Hari</th>
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
													<td><?= $c->nama_matkul ?></td>
													<td><?= $c->nama_hari?></td>
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