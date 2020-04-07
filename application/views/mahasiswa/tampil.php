<html>
<head>
  <title>IMPORT EXCEL CI 3</title>
</head>
<body>
  <h1>Data Siswa</h1><hr>
  <a href="<?php echo base_url("mahasiswa/input/form"); ?>">Import Data</a><br><br>
  <table border="1" cellpadding="8">
  <tr>
    <th>NIM</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>golongan</th>
  </tr>
  <?php
  if( ! empty($mahasiswa)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
    foreach($mahasiswa as $data){ // Lakukan looping pada variabel siswa dari controller
      echo "<tr>";
      echo "<td>".$data->nim."</td>";
      echo "<td>".$data->nama_mahasiswa."</td>";
      echo "<td>".$data->password_mahasiswa."</td>";
      echo "<td>".$data->golongan."</td>";
      echo "</tr>";
    }
  }else{ // Jika data tidak ada
    echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
  }
  ?>
  </table>
</body>
</html>

