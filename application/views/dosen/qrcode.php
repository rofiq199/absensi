<script type="text/javascript">
	setInterval("my_function();",500); 
    function my_function(){
      $('.card-body').load(location.href + ' .absen');
    }
</script>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Matkul </h4>
              
			</div>
            <?php foreach ($matkul as $data) {
				?>
					<center>
						<h4><?= $data->kode_matkul ?></h4>
					</center>
					<center><img src="<?php echo base_url('images/' . $data->id . '.png') ?>" heigh="300px" width="300px" alt=""></center>
				<?php } ?>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title">List Absen</h4>
                            </div>
					</div>
			<div class="card-body">
				<div class="absen">
                
				<div class="table-responsive">
				<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>NIM</th>
													<th>Golongan</th>
													<th>Waktu</th>
													<th>Keterangan</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
												<th>NIM</th>
													<th>Golongan</th>
													<th>Waktu</th>
													<th>Keterangan</th>
													<th>Action</th>
												</tr>
											</tfoot>
											<tbody>
												<?php 
												foreach ($show as $c) {
												?>
												<tr>
													<td><?=$c->nim?></td>
													<td><?=$c->golongan_absen?></td>
													<td><?= $c->tanggal_absen ?></td>
													<td><?= $c->status ?></td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="modal" data-target="#edit<?= $c->nim?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															<button type="button" onclick="window.location.href='<?= base_url('admin/DataDosen/hapus/'.$c->nim); ?>'"  data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
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
															Dosen
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Ganti Status Absen</p>
													<form action="<?= base_url('admin/DataDosen/update');?>" method="POST">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>NIP</label>
																	<input type="text" hidden value="<?= $c->nim?>" name="nip" class="form-control" placeholder="Masukkan Nip Dosen">
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
</div>