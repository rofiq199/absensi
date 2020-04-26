<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">List Dosen</h4>
					</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Tambah Dosen</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambah">
											<i class="fa fa-plus"></i>
											Tambah Dosen
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
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>NIP</th>
													<th>Kode Prodi</th>
													<th>Dosen</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
                                                <th>NIP</th>
													<th>Kode Prodi</th>
													<th>Dosen</th>
													<th>Action</th>
												</tr>
											</tfoot>
											<tbody>
												<?php 
												foreach ($dosen as $c) {
												?>
												<tr>
													<td><?=$c->nip?></td>
													<td><?=$c->kode_prodi?></td>
													<td><?= $c->nama_dosen ?></td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="modal" data-target="#edit<?= $c->nip?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															<button type="button" onclick="window.location.href='<?= base_url('admin/dosen/hapus/'.$c->nip); ?>'"  data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fa fa-times"></i>
															</button>
														</div>
													</td>
												</tr>
													<!-- Modal -->
									<div class="modal fade" id="edit<?= $c->nip?>" tabindex="-1" role="dialog" aria-hidden="true">
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
																	<input type="text" value="<?= $c->nip?>" name="nip" class="form-control" placeholder="Masukkan Nip Dosen">
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Nama Dosen</label>
																	<input name="nama_dosen" value="<?= $c->nama_dosen ?>" type="text" class="form-control" placeholder="Masukkan nama Dosen">
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Password Dosen</label>
																	<input name="password_dosen" value="<?= $c->password_dosen ?>" type="text" class="form-control" placeholder="Masukkan Pass Dosen">
																</div>
															</div>
															<div class="col-sm-12 pr-0">
																<div class="form-group form-group-default">
																<label>Prodi</label>
																<select name="prodi" class="form-control">
																<option selected="selected" value="<?= $c->kode_prodi ?>"> <?= $c->nama_prodi ?></option>
																<?php foreach ($prodi as $a ) {
																	if($c->kode_prodi != $a->kode_prodi){
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