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
						<h4 class="page-title">List Matkul</h4>
					</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Tambah Matkul</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambah">
											<i class="fa fa-plus"></i>
											Tambah Matkul
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
															Matkul
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Isi Matkul</p>
													<form action="<?= base_url('admin/DataMatkul/add');?>" method="POST">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Kode Matkul</label>
																	<input type="text" name="kode_matkul" class="form-control" placeholder="Masukkan Kode Matkul">
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Nama Matkul</label>
																	<input  type="text" name="nama_matkul" class="form-control" placeholder="Masukkan Nama Matkul">
																</div>
															</div>
															<div class="col-sm-12">
															<div class="form-group form-group-default">
															<label>Prodi</label>
															<select name="prodi" class="form-control">
															<?php foreach ($prodi as $a ) {
																	echo "<option value='$a->kode_prodi'>$a->nama_prodi</option>" ;
																} ?>
															</select>
															</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																<label>Dosen</label>
																<select name="dosen" class="form-control">
																<?php foreach ($dosen as $b ) {
																	echo "<option value='$b->nip'>$b->nama_dosen</option>" ;
																} ?>
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
													<input type="submit"  value="Tambah" class="btn btn-primary">
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
													<th>Kode matkul</th>
													<th>Kode Prodi</th>
													<th>Nama Matkul</th>
													<th>Dosen</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
                                                <th>Kode matkul</th>
													<th>Kode Prodi</th>
													<th>Nama Matkul</th>
													<th>Dosen</th>
													<th>Action</th>
												</tr>
											</tfoot>
											<tbody>
												<?php 
												foreach ($matkul as $c) {
												?>
												<tr>
													<td><?=$c->kode_matkul?></td>
													<td><?=$c->kode_prodi?></td>
													<td><?=$c->nama_matkul?></td>
													<td><?= $c->nama_dosen ?></td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="modal" data-target="#edit<?=$c->kode_matkul;?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															<button type="button"  data-hapus='<?= base_url('admin/DataMatkul/hapus/'.$c->kode_matkul); ?>' data-toggle="tooltip" title="" class="btn btn-link btn-danger tombolhapus" data-original-title="hapus">
																<i class="fa fa-times"></i>
															</button>
														</div>
													</td>
												</tr>
									<!-- Modal -->
									<div class="modal fade" id="edit<?=$c->kode_matkul?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Tambah</span> 
														<span class="fw-light">
															Matkul
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Isi Matkul</p>
													<form action="<?= base_url('admin/DataMatkul/update');?>" method="POST">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Kode Matkul</label>
																	<input type="text" name="kode_matkul1" value="<?= $c->kode_matkul ?>" class="form-control" placeholder="Masukkan Kode Matkul">
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Nama Matkul</label>
																	<input  type="text" name="nama_matkul1" value="<?= $c->nama_matkul ?>" class="form-control" placeholder="Masukkan Nama Matkul">
																</div>
															</div>
															<div class="col-sm-12">
															<div class="form-group form-group-default">
															<label>Prodi</label>
															<select name="prodi1" class="form-control">
															<option selected="selected" value="<?=$c->kode_prodi ?>"><?=$c->nama_prodi ?></option>
															<?php foreach ($prodi as $a ) {
																if($c->kode_prodi != $a->kode_prodi){
																	echo "<option value='$a->kode_prodi'>$a->nama_prodi</option>" ;
																} }?>
															</select>
															</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																<label>Dosen</label>
																<select name="dosen1" class="form-control">
																<option selected="selected" value="<?=$c->nip ?>"><?=$c->nama_dosen ?></option>
																<?php foreach ($dosen as $b ) {
																	if($c->nip != $b->nip){
																	echo "<option value='$b->nip'>$b->nama_dosen</option>" ;
																}} ?>
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
													<input type="submit"  value="Update" class="btn btn-primary">
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