<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">List Mahasiswa</h4>
					</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Tambah Mahasiswa</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#import">
											<i class="fa fa-plus"></i>
											Import Mahasiswa
										</button>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambah">
											<i class="fa fa-plus"></i>
											Tambah Mahasiswa
										</button>
									</div>
								</div>
								<div class="card-body">

								<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Import</span> 
														<span class="fw-light">
															Mahasiswa
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Isi data Mahasiswa dengan benar</p>
													<form action="<?= base_url('admin/mahasiswa/upload');?>" method="POST" enctype="multipart/form-data">
														<div class="row">
														<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Excel</label>
																	<input type="file" name="userfile" class="form-control" placeholder="Masukkan Nim Mahasiswa">
																</div>
															</div>
															<div class="col-md-6 ">
																<div class="form-group form-group-default">
																	<center><a href="<?=base_url('admin/mahasiswa/download')?>"> Silahkan Download Format Excel</a></center>
																</div>
															</div>
												<div class="modal-footer no-bd">
													<input type="submit" value="Import" class="btn btn-primary">
													<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
												</div>
												</form>
											</div>
										</div>
									</div>
									</div>
									</div>
									</div>
									<!-- Modal -->
									<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Tambah</span> 
														<span class="fw-light">
															Mahasiswa
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Isi data Mahasiswa dengan benar</p>
													<form action="<?= base_url('admin/mahasiswa/add');?>" method="POST" enctype="multipart/form-data">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Nim</label>
																	<input type="text" name="nim" class="form-control"   placeholder="Masukkan Nim Mahasiswa">
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Nama</label>
																	<input name="nama" type="text" class="form-control"   placeholder="Masukkan Nama Mahasiswa">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Golongan</label>
																	<input type="text" name="golongan" class="form-control"   placeholder="Masukkan Golongan Mahasiswa">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Password</label>
																	<input type="text" name="password"  class="form-control" placeholder="Masukkan Password Mahasiswa">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Kode Prodi</label>
																	<select name="prodi" class="form-control" >
																	<?php foreach ($prodi as $a) {
																	?>
																	<option value="<?=$a->kode_prodi ?>"><?= $a->nama_prodi?></option>>
																	<?php }?>
																	</select>
																	
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Semester</label>
																	<select name="semester" class="form-control" >
																	<option value="1">1</option>
																	<option value="2">2</option>
																	<option value="3">3</option>
																	<option value="4">4</option>
																	<option value="5">5</option>
																	<option value="6">6</option>
																	<option value="7">7</option>
																	<option value="8">8</option>
																	</select>
																</div>
															</div>
														</div>
												</div>
												<div class="modal-footer no-bd">
													<input type="submit" value="Tambah" class="btn btn-primary">
													<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
												</div>
												</form>
											</div>
										</div>
									</div>

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Nim</th>
													<th>Nama</th>
													<th>Kode Prodi</th>
													<th>Golongan/Semester</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>Name</th>
													<th>Position</th>
													<th>Office</th>
													<th>Action</th>
												</tr>
											</tfoot>
											<tbody>
												<?php 
												foreach ($mahasiswa as $c) {
												?>
												<tr>
													<td><?=$c->nim?></td>
													<td><?=$c->nama_mahasiswa?></td>
													<td><?=$c->kode_prodi?></td>
													<td><?=$c->golongan?>/<?=$c->semester?></td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fa fa-times"></i>
															</button>
														</div>
													</td>
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