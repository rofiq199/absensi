<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">List Prodi</h4>
					</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Tambah Prodi</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambah">
											<i class="fa fa-plus"></i>
											Tambah Prodi
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
															Mahasiswa
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Isi data Prodi dengan benar</p>
													<form action="<?= base_url('admin/dataprodi/add');?>" method="POST">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Kode Prodi</label>
																	<input type="text" name="kode_prodi" class="form-control" placeholder="Masukkan Kode Prodi">
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Nama Prodi</label>
																	<input type="text" name="nama_prodi" class="form-control" placeholder="Masukkan Nama Prodi">
																</div>
															</div>
															<div class="col-sm-12 pr-0">
																<div class="form-group form-group-default">
																	<label>Jurusan</label>
																	<select name="jurusan" class="form-control" >
																	<?php foreach ($jurusan as $a) {
																	?>
																	<option value="<?=$a->kode_jurusan ?>"><?= $a->nama_jurusan?></option>>
																	<?php }?>
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
										</div>
										</form>
									</div>
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Kode Prodi</th>
													<th>Jurusan</th>
													<th>Nama Prodi</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
                                                <th>Kode Prodi</th>
													<th>Jurusan</th>
													<th>Nama Prodi</th>
													<th>Action</th>
												</tr>
											</tfoot>
											<tbody>
												<?php 
												foreach ($prodi as $c) {
												?>
												<tr>
													<td><?=$c->kode_prodi?></td>
													<td><?=$c->nama_jurusan?></td>
													<td><?=$c->nama_prodi?></td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="modal" data-target="#edit<?= $c->kode_prodi?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															<button type="button"  onclick="window.location.href='<?= base_url('admin/dataprodi/hapus/'.$c->kode_prodi); ?>'" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="hapus">
																<i class="fa fa-times"></i>
															</button>
														</div>
													</td>
												</tr>
															<!-- Modal -->
									<div class="modal fade" id="edit<?= $c->kode_prodi?>" tabindex="-1" role="dialog" aria-hidden="true">
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
													<p class="small">Isi data Prodi dengan benar</p>
													<form action="<?= base_url('admin/dataprodi/update');?>" method="POST">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Kode Prodi</label>
																	<input type="text" value="<?= $c->kode_prodi?>" name="kode_prodi" class="form-control" placeholder="Masukkan Kode Prodi">
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Nama Prodi</label>
																	<input type="text"  value="<?= $c->nama_prodi?>" name="nama_prodi" class="form-control" placeholder="Masukkan Nama Prodi">
																</div>
															</div>
															<div class="col-sm-12 pr-0">
																<div class="form-group form-group-default">
																	<label>Jurusan</label>
																	<select name="jurusan" class="form-control" >
																	<option selected="selected" value="<?=$c->kode_jurusan ?>"><?=$c->nama_jurusan ?></option>
																	<?php foreach ($jurusan as $a) {
																		if($c->kode_jurusan != $a->kode_jurusan){
																			echo "<option value='$a->kode_jurusan'>$a->nama_jurusan</option>" ;
																		}
																	}?>
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