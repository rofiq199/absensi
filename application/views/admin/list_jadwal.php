<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">List Jadwal</h4>
					</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambah">
											<i class="fa fa-plus"></i>
											Tambah Jadwal
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
														<span>
														<font color="white">Tambah</font></span> 
														<span class="fw-light">
															Jadwal
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Isi data dengan benar</p>
													<form action="<?= base_url('admin/datajadwal/add'); ?>" method="POST">
														<div class="row">
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																<label>Hari</label>
																	<select name="hari" class="form-control" >
																	<?php foreach ($hari as $a) {	
																	?>
																	<option value="<?=$a->kode_hari?>"><?= $a->nama_hari ?></option>
																	<?php }?>
																	</select>
																</div>
															</div>
															<div class="col-md-6 ">
																<div class="form-group form-group-default">
																<label>Waktu</label>
																	<select name="waktu" class="form-control" >
																	<?php foreach ($waktu as $b) {	
																	?>
																	<option value="<?=$b->kode_waktu?>"><?= $b->waktu_mulai?>-<?= $b->waktu_selesai ?></option>
																	<?php }?>
																	</select>
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																<label>Matkul</label>
																	<select name="matkul" class="form-control" >
																	<?php foreach ($matkul as $c) {	
																	?>
																	<option value="<?=$c->kode_matkul?>"><?= $c->nama_matkul ?></option>
																	<?php }?>
																	</select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Golongan</label>
																	<select name="golongan" class="form-control" >
																	<option value="A">A</option>
																	<option value="B">B</option>
																	<option value="C">C</option>
																	<option value="D">D</option>
																	<option value="E">E</option>
																	<option value="F">Internasional</option>
																	<option value="G">Bondowoso</option>
																	</select>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Ruangan</label>
																	<input type="text" name="ruang" class="form-control" placeholder="Masukkan Ruangan">
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
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Nama Matkul</th>
													<th>Waktu</th>
													<th>Hari</th>
													<th>Ruangan</th>
													<th>Golongan/SMT</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
												<th>Nama Matkul</th>
													<th>Waktu</th>
													<th>Hari</th>
													<th>Ruangan</th>
													<th>Golongan/SMT</th>
													<th>Action</th>
												</tr>
											</tfoot>
											<tbody>
												<?php 
												foreach ($jadwal as $c) {
												?>
												<tr>
													<td><?=$c->nama_matkul?> <?=$c->kode_prodi?></td>
													<td><?=$c->waktu_mulai?>-<?=$c->waktu_selesai?></td>
													<td><?=  $c->nama_hari?></td>
													<td><?= $c->ruangan ?></td>
													<td><?= $c->golongan?>/<?=$c->semester?></td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="modal" data-target="#edit<?= $c->kode_jadwal?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															<button type="button"  onclick="window.location.href='<?= base_url('admin/datajadwal/hapus/'.$c->kode_jadwal); ?>'"  data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
																<i class="fa fa-times"></i>
															</button>
														</div>
													</td>
												</tr>
									<!-- Modal -->
									<div class="modal fade" id="edit<?=$c->kode_jadwal?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Edit</span> 
														<span class="fw-light">
															Jadwal
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Isi data dengan benar</p>
													<form action="<?= base_url('admin/datajadwal/add'); ?>" method="POST">
														<div class="row">
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																<label>Hari</label>
																	<select name="hari" class="form-control" >
																	<?php foreach ($hari as $a) {	
																	?>
																	<option value="<?=$a->kode_hari?>"><?= $a->nama_hari ?></option>
																	<?php }?>
																	</select>
																</div>
															</div>
															<div class="col-md-6 ">
																<div class="form-group form-group-default">
																<label>Waktu</label>
																	<select name="waktu" class="form-control" >
																	<?php foreach ($waktu as $b) {	
																	?>
																	<option value="<?=$b->kode_waktu?>"><?= $b->waktu_mulai?>-<?= $b->waktu_selesai ?></option>
																	<?php }?>
																	</select>
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																<label>Matkul</label>
																	<select name="matkul" class="form-control" >
																	<?php foreach ($matkul as $c) {	
																	?>
																	<option value="<?=$c->kode_matkul?>"><?= $c->nama_matkul ?></option>
																	<?php }?>
																	</select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Golongan</label>
																	<select name="golongan" class="form-control" >
																	<option value="A">A</option>
																	<option value="B">B</option>
																	<option value="C">C</option>
																	<option value="D">D</option>
																	<option value="E">E</option>
																	</select>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Ruangan</label>
																	<input type="text" name="ruang" class="form-control" placeholder="Masukkan Ruangan">
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