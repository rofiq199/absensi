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
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="add-row" class="display table table-striped table-hover">
								<thead>
									<tr>
										<th rowspan="2">Matkul</th>
										<th colspan="16">
											<center>Minggu Ke</center>
										</th>
										<th rowspan="2">Kehadiran(%)</th>
									</tr>
									<tr>
										<?php foreach ($pertemuan as $a) {
										?>
											<th class="mx-0"><?= $a->minggu ?></th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($matkul as $e) {

									?>
										<tr>
											<td class="mx-0"><?= $e->nama_matkul ?></td>
											<?php
											foreach ($pertemuan as $p) {

												echo '<td class="mx-0">';
												foreach ($rekap as $absen) {
													if ($e->kode_matkul == $absen->kode_matkul && $p->minggu == $absen->pertemuan) {
														echo $absen->status;
													}
												}
												echo '</td>';
											} ?>
											<td class="mx-0">
												<?php 
													foreach ($persen as $h) {
														if($e->kode_matkul == $h->kode_matkul){
															echo "$h->persent%";
														}
													}?>
											</td>
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