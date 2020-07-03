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
							<h4 class="card-title">List</h4>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="add-row" class="display table table-striped table-hover">
								<thead>
									<tr>
										<th rowspan="2">
											<center>matkul</center>
										</th>
										<th colspan="8">
											<center>golongan</center>
										</th>
									</tr>
									<tr>
										<?php
										$golongan1 = range('A', 'G');
										foreach ($golongan1 as $b) {
											echo "<td>" . $b . "</td>";
										} ?>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($matkul as $a) {
									?>
										<tr>
											<td><?= $a->nama_matkul ?></td>
											<?php $golongan = range('A', 'G');
											foreach ($golongan as $i) {

											?>
												<td><a href="<?php echo base_url("admin/RekapAbsen/index/" . $a->kode_matkul . "/" . $i . "/" . $a->semester) ?>"><?= $a->kode_matkul ?>/<?= $i; ?></a></td>
											<?php } ?>
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