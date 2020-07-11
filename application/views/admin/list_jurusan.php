<div class="main-panel">
			<div class="content">
			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">List Jurusan</h4>
					</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambah">
											<i class="fa fa-plus"></i>
											Tambah Jurusan
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
															Jurusan
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Isi data Jurusan dengan benar</p>
													<form action="<?= base_url('admin/DataJurusan/add');?>" method="POST">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Kode Prodi</label>
																	<input type="text" name="kode_jurusan1" class="form-control" placeholder="Masukkan Kode Jurusan">
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Nama Jurusan</label>
																	<input type="text" name="nama_jurusan1" class="form-control" placeholder="Masukkan Nama Jurusan">
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
													<th>Kode Jurusan</th>
													<th>Nama Jurusan</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
                                                <th>Kode Prodi</th>
													<th>Nama Jurusan</th>
													<th>Action</th>
												</tr>
											</tfoot>
											<tbody>
												<?php 
												foreach ($jurusan as $c) {
												?>
												<tr>
													<td><?=$c->kode_jurusan?></td>
													<td><?=$c->nama_jurusan?></td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="modal" data-target="#edit<?= $c->kode_jurusan?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															<button type="button"  onclick="window.location.href='<?= base_url('admin/DataJurusan/hapus/'.$c->kode_jurusan); ?>'" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="hapus">
																<i class="fa fa-times"></i>
															</button>
														</div>
													</td>
												</tr>
															<!-- Modal -->
									<div class="modal fade" id="edit<?= $c->kode_jurusan?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Edit</span> 
														<span class="fw-light">
															Jurusan
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Isi data Jurusan dengan benar</p>
													<form action="<?= base_url('admin/DataJurusan/update');?>" method="POST">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Kode Jurusan</label>
																	<input type="text" value="<?= $c->kode_jurusan?>" name="kode_jurusan" class="form-control" placeholder="Masukkan Kode Prodi">
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Nama Jurusan</label>
																	<input type="text"  value="<?= $c->nama_jurusan?>" name="nama_jurusan" class="form-control" placeholder="Masukkan Nama Prodi">
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