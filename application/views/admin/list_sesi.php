<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">List Sesi</h4>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title">Tambah Sesi</h4>
							<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambah">
								<i class="fa fa-plus"></i>
								Tambah Sesi
							</button>
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
												Sesi
											</span>
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p class="small">Isi data dengan benar</p>
										<form action="<?= base_url('admin/datasesi/add'); ?>" method="POST">
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group form-group-default">
														<label>Waktu Mulai</label>
														<input type="time" name="waktu_mulai" class="form-control" placeholder="Masukkan waktu mulai">
													</div>
												</div>
												<div class="col-sm-12">
													<div class="form-group form-group-default">
														<label>Waktu Selesai</label>
														<input type="time" name="waktu_selesai" class="form-control" placeholder="Masukkan waktu selesai">
													</div>
												</div>
											</div>
									</div>
									<div class="modal-footer no-bd">
										<input type="submit" value="Tambah" class="btn btn-primary">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
							</form>
						</div>
						<div class="table-responsive">
							<table id="add-row" class="display table table-striped table-hover">
								<thead>
									<tr>
										<th>Kode Sesi</th>
										<th>Waktu Mulai</th>
										<th>Waktu Selesai</th>
										<th style="width: 10%">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($waktu as $c) {
									?>
										<tr>
											<td><?= $c->kode_waktu ?></td>
											<td><?= $c->waktu_mulai ?></td>
											<td><?= $c->waktu_selesai ?></td>
											<td>
												<div class="form-button-action">
													<button type="button" data-toggle="modal" data-target="#edit<?= $c->kode_waktu ?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
														<i class="fa fa-edit"></i>
													</button>
													<button type="button" onclick="window.location.href='<?= base_url('admin/datasesi/hapus/' . $c->kode_waktu); ?>'" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="hapus">
														<i class="fa fa-times"></i>
													</button>
												</div>
											</td>
										</tr>
										<!-- Modal -->
										<div class="modal fade" id="edit<?= $c->kode_waktu ?>" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header no-bd">
														<h5 class="modal-title">
															<span class="fw-mediumbold">
																Edit</span>
															<span class="fw-light">
																Sesi
															</span>
														</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<p class="small">Isi data dengan benar</p>
														<form action="<?= base_url('admin/datasesi/update'); ?>" method="POST">
															<div class="row">
																<input type="text" name="kode_waktu" hidden value="<?= $c->kode_waktu ?>">
																<div class="col-sm-12">
																	<div class="form-group form-group-default">
																		<label>Waktu Mulai</label>
																		<input type="time" value="<?= $c->waktu_mulai ?>" name="waktu_mulai1" class="form-control" placeholder="Masukkan waktu mulai">
																	</div>
																</div>
																<div class="col-sm-12">
																	<div class="form-group form-group-default">
																		<label>Waktu Selesai</label>
																		<input type="time" value="<?= $c->waktu_selesai ?>" name="waktu_selesai1" class="form-control" placeholder="Masukkan waktu selesai">
																	</div>
																</div>
															</div>
													</div>
													<div class="modal-footer no-bd">
														<input type="submit" value="Tambah" class="btn btn-primary">
														<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
											</form>
										</div>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>