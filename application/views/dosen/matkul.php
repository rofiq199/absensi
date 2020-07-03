<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Matkul </h4>

			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title">List Matkul</h4>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="add-row" class="display table table-striped table-hover">
								<thead>
									<tr>
										<th>Matkul</th>
										<th colspan="<?php echo count($pertemuan); ?>">
											<center>Minggu </center>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($hak as $a) {
									?>
										<tr>
											<td class="mx-0"><a href="<?php echo base_url("dosen/matkuldos/qrcode/" . $a->kode_matkul) ?>"><?= $a->nama_matkul ?></a></td>
											<?php foreach ($pertemuan as $c) {
											?>
												<td><a href="<?php echo base_url("dosen/matkuldos/qrcode/" . $a->kode_matkul . "/" . $c->minggu) ?>"><?= $c->minggu ?></a></td>
											<?php  } ?>
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