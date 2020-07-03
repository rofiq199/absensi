<h1>Data Gambar</h1><hr>
<a href="<?php echo base_url("Gambar/tambah"); ?>">Tambah Gambar</a><br><br>
<table border="1" cellpadding="8">
<tr>
  <th>No</th>
  <th>Mata kuliah</th>
  <th>Dosen</th>
  <th>Jam</th>
  <th>Ruangan</th>
</tr>
<?php
if( ! empty($gambar)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
  foreach($gambar as $data){ // Lakukan looping pada variabel gambar dari controller
    echo "<tr>";
    echo "<td>".$data->deskripsi."</td>";
    echo "<td>".$data->nama_file."</td>";
    echo "<td>".$data->ukuran_file." kB</td>";
    echo "<td>".$data->tipe_file."</td>";
    echo "</tr>";
  }
}else{ // Jika data tidak ada
  echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
}
?>
</table>