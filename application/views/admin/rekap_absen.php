<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Rekap Absen</h4>
						
					</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Rekap Absen</h4>
										<?php  
											$kode_matkul = $this->uri->segment('4');
											$golongan = $this->uri->segment('5');
											$semester = $this->uri->segment('6');?>
										<button class="btn btn-primary btn-round ml-auto" onclick="window.location.href='<?php echo base_url('admin/rekap_absen/export/'.$kode_matkul.'/'.$golongan.'/'.$semester.'/') ?>'">
											<i class="fa fa-plus"></i>
											Export Pdf
										</button>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
												<th rowspan="2">Matkul</th>
													<th colspan="17"><center>Minggu Ke</center></th>
												</tr>
												<tr>
												<?php foreach ($pertemuan as $a) {
													?>
												<th class="mx-0"><?= $a->minggu ?></th>
												<?php }?>
												</tr>
											</thead>
											<tbody>
											<?php foreach ($mahasiswa as $e ) {
												
											 ?>
												<tr>
												<td class="mx-0"><?=$e->nama_mahasiswa ?></td>
												<?php 
												foreach ($pertemuan as $p){
												
													echo '<td class="mx-0">';
													foreach ($rekap as $absen){
													if($e->nim==$absen->nim && $p->minggu==$absen->pertemuan){
														echo $absen->status;
													}
												}
													echo '</td>';}?>
												</tr>
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