<div class="main_panel">
<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Matkul </h4>
<?php foreach ($matkul as $data){
 ?>
<p><?=$data->kode_matkul ?></p>
<center><h4><?= $data->kode_matkul?></h4></center>
   <center><img src="<?php echo base_url('images/'.$data->id.'.png') ?>" heigh="300px" width="300px" alt=""></center>
<?php }?>
</div>
</div>
</div>
</div>