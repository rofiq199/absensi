<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php foreach ($matkul as $data){
 ?>
<p><?=$data->kode_matkul ?></p>
   <center><img src="<?php echo base_url('images/'.$data->id.'.png') ?>" heigh="300px" width="300px" alt=""></center>
<?php }?>
</body>
</html>