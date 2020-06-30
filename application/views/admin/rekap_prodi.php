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
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
                                            <tr>
                                            <th rowspan="2"><center>Prodi</center></th>
                                            <th colspan="8"><center>semester</center></th>
                                            </tr>
                                            <tr>
												<th>1</th>
													<th>2</th>
                                                    <th>3</th>
                                                    <th>4</th>
                                                    <th>5</th>
                                                    <th>6</th>
                                                    <th>7</th>
                                                    <th>8</th>
                                             </tr>
											</thead>
											<tbody>
                                            <?php 
                                            foreach ($prodi as $a) {
												?>
                                               <tr>
											   <td><?=$a->nama_prodi?></td>
											   <?php for ($i=1; $i<=8 ; $i++) { 
											   ?>
											   <td><a href="<?php echo base_url("admin/rekap/show/".$a->kode_prodi."/".$i)?>"><?=$a->kode_prodi?><?=$i;?></a></td>
											   <?php }?>
											   </tr>
                                            
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