<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <?php 
?>
<table>
<th>No</th>
<th>hari</th>
<th>jadwal</th>
<?php 
$no=1;
foreach ($tampil as $c) {
?>
<tr>
<td><?=$no++;?></td>
<td><?= $c['nama_hari'];?></td>
<td><center><?=$c['nama_matkul'];?> <br> <?=$c['nama_dosen'];?><br> <?=$c['waktu_mulai'];?>-<?=$c['waktu_selesai'];?></center></td>
</tr>
<?php }?>
</table>
</body>
</html>