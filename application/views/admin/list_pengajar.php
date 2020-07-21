<script>
$('document').ready(function(){
$('.tombolhapus').on('click',function (e) {
    var hapusdata = $('.tombolhapus').data('hapus');
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data akan dihapus secara permanen",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
		confirmButtonText: 'Yakin!',
		cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
            window.location.href = hapusdata
        }
    })
})
})
</script>
<div class="main-panel">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">List Pengajar</h4>
					</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Tambah pengajar</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambah">
											<i class="fa fa-plus"></i>
											Tambah Pengajar
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
															Pengajar
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Isi data Dosen dengan benar</p>
													<form action="<?= base_url('admin/DataPengajar/add');?>" method="POST">
														<div class="row">
															<div class="col-sm-12 pr-0">
																<div class="form-group form-group-default">
																<label>Nama Dosen</label>
																<select name="nip" class="form-control">
																<?php foreach ($dosen as $a ) {
																	echo "<option value='$a->nip'>$a->nama_dosen</option>" ;
																} ?>
																</select>
																</div>
															</div>
															<div class="col-sm-12 pr-0">
																<div class="form-group form-group-default">
																<label>Nama Matkul</label>
																<select name="matkul" class="form-control">
																<?php foreach ($matkul as $b ) {
																	echo "<option value='$b->kode_matkul'>$b->nama_matkul</option>" ;
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
													<th>Dosen</th>
													<th>Kode Matkul</th>
													<th>Nama Matkul</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
                                                <th>NIP</th>
													<th>Dosen</th>
													<th>Kode Matkul</th>
													<th>Nama Matkul</th>
													<th>Action</th>
												</tr>
											</tfoot>
											<tbody>
												<?php 
												foreach ($pengajar as $c) {
												?>
												<tr>
													<td><?=$c->pengajar?></td>
													<td><?= $c->nama_dosen ?></td>
													<td><?= $c->kode_matkul ?></td>
													<td><?= $c->nama_matkul?></td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="modal" data-target="#edit<?= $c->pengajar?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															<button type="button" data-hapus='<?= base_url('admin/DataPengajar/hapus/'.$c->pengajar); ?>' data-toggle="tooltip" title="" class="btn btn-link btn-danger tombolhapus" data-original-title="Remove">
																<i class="fa fa-times"></i>
															</button>
														</div>
													</td>
												</tr>
													<!-- Modal -->
									<div class="modal fade" id="edit<?= $c->pengajar?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Edit</span> 
														<span class="fw-light">
															Pengajar
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Isi data Dosen dengan benar</p>
													<form action="<?= base_url('admin/DataPengajar/update');?>" method="POST">
														<div class="row">
															<div class="col-sm-12 pr-0">
																<div class="form-group form-group-default">
																<label>Nama Dosen</label>
																<select name="dosen" class="form-control">
																<option select="se;ected" value="<?=$c->pengajar?>"><?=$c->nama_dosen?></option>
																<?php foreach ($dosen as $a ) {
																	if($c->pengajar != $a->nip){
																	echo "<option value='$a->nip'>$a->nama_dosen</option>" ;
																}} ?>
																</select>
																</div>
															</div>
															<div class="col-sm-12 pr-0">
																<div class="form-group form-group-default">
																<label>Nama Matkul</label>
																<select name="matkul" class="form-control">
																<?php foreach ($matkul as $b ) {
																	echo "<option value='$b->kode_matkul'>$b->nama_matkul</option>" ;
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