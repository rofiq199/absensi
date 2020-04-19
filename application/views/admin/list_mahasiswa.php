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
													<p class="small">Import data Mahasiswa sesuai dengan format yang ditentukan</p>
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
													<th style="width: 10%">Aksi</th>
												</tr>
											</thead>
											<tfoot>
											<tr>
													<th>Nim</th>
													<th>Nama</th>
													<th>Kode Prodi</th>
													<th>Golongan/Semester</th>
													<th >Aksi</th>
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
															<button type="button" data-toggle="modal" data-toggle="tooltip" title="Edit" class="btn btn-link btn-primary btn-lg" data-target="#edit<?= $c->nim ?>" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															<button type="button"  onclick="window.location.href='<?= base_url('admin/mahasiswa/hapus/'.$c->nim); ?>'"  data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
																<i class="fa fa-times"></i>
															</button>
														</div>
													</td>
												</tr>
												
												<!-- Modal -->
									<div class="modal fade" id="edit<?= $c->nim?>" tabindex="-1" role="dialog" aria-hidden="true">
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
													<form action="<?= base_url('admin/mahasiswa/update');?>" method="POST" enctype="multipart/form-data">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Nim</label>
																	<input type="text" name="nim1" class="form-control"  value="<?= $c->nim ?>"  placeholder="Masukkan Nim Mahasiswa">
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Nama</label>
																	<input name="nama1" type="text" class="form-control"  value="<?= $c->nama_mahasiswa?>" placeholder="Masukkan Nama Mahasiswa">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Golongan</label>
																	<input type="text" name="golongan1" class="form-control" value="<?=$c->golongan?>"   placeholder="Masukkan Golongan Mahasiswa">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Password</label>
																	<input type="text" name="password1"  class="form-control" value="<?=$c->password_mahasiswa?>" placeholder="Masukkan Password Mahasiswa">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Kode Prodi</label>
																	<select name="prodi1" class="form-control" >
																	<option selected="selected" value="<?=$c->kode_prodi ?>"><?=$c->nama_prodi ?></option>
																	<?php foreach ($prodi as $a) {
																		if($c->kode_prodi != $a->kode_prodi){
																	?>
																	<option value="<?=$a->kode_prodi ?>"><?= $a->nama_prodi?></option>>
																	<?php }}?>
																	</select>
																	
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Semester</label>
																	<select name="semester1" class="form-control" >
																	<option selected="selected" value="<?=$c->semester ?>"><?=$c->semester ?></option>
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
													<input type="submit" value="Update" class="btn btn-primary">
													<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
												</div>
												</form>
											</div>
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
	
	