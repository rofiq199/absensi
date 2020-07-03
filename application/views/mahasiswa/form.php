<html>
<head>
  <title>Form Import</title>
  
  <!-- Load File jquery.min.js yang ada difolder js -->
  <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
  
  <script>
  $(document).ready(function(){
    // Sembunyikan alert validasi kosong
    $("#kosong").hide();
  });
  </script>
</head>
<body>
  <h3>Form Import</h3>
  <hr>
  
  <a href="<?php echo base_url("excel/format.xlsx"); ?>">Download Format</a>
  <br>
  <br>
  
  <!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
  <form method="post" action="<?php echo base_url("mahasiswa/InputMhs/form"); ?>" enctype="multipart/form-data">
    <!-- 
    -- Buat sebuah input type file
    -- class pull-left berfungsi agar file input berada di sebelah kiri
    -->
    <input type="file" name="file">
    
    <!--
    -- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
    -->
    <input type="submit" name="preview" value="Preview">
  </form>
  
  <?php
  if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
    if(isset($upload_error)){ // Jika proses upload gagal
      echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
      die; // stop skrip
    }
    
    // Buat sebuah tag form untuk proses import data ke database
    echo "<form method='post' action='".base_url("mahasiswa/InputMhs/import")."'>";
    
    // Buat sebuah div untuk alert validasi kosong
    echo "<div style='color: red;' id='kosong'>
    Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
    </div>";
    
    echo "<table border='1' cellpadding='8'>
    <tr>
      <th colspan='5'>Preview Data</th>
    </tr>
    <tr>
      <th>NIS</th>
      <th>Nama</th>
      <th>Jenis Kelamin</th>
      <th>Alamat</th>
    </tr>";
    
    $numrow = 1;
    $kosong = 0;
    
    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach($sheet as $row){ 
      // Ambil data pada excel sesuai Kolom
      $nim = $row['A']; // Ambil data NIS
      $kode_prodi = $row['B']; // Ambil data nama
      $nama_mahasiwa = $row['C']; // Ambil data jenis kelamin
      $password_mahasiswa = $row['D']; // Ambil data alamat
      $golongan = $row['E'];
      $semester = $row['F'];
      // Cek jika semua data tidak diisi
      if($nim == "" && $nama_mahasiwa == "" && $golongan == "" && $semester == "")
        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
      
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Validasi apakah semua data telah diisi
        $nim_td = ( ! empty($nim))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
        $nama_mahasiswa_td = ( ! empty($nama_mahasiwa))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
        $password_mahasiswa_td = ( ! empty($password_mahasiswa))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
        $golonagn_td = ( ! empty($golongan))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        
        // Jika salah satu data ada yang kosong
        if($nim == "" or $nama_mahasiwa == "" or $password_mahasiswa == "" or $golongan == ""){
          $kosong++; // Tambah 1 variabel $kosong
        }
        
        echo "<tr>";
        echo "<td".$nim_td.">".$nis."</td>";
        echo "<td".$nama_mahasiswa_td.">".$nama_mahasiswa."</td>";
        echo "<td".$password_mahasiswa_td.">".$password_mahasiswa."</td>";
        echo "<td".$golongan_td.">".$golongan."</td>";
        echo "</tr>";
      }
      
      $numrow++; // Tambah 1 setiap kali looping
    }
    
    echo "</table>";
    
    // Cek apakah variabel kosong lebih dari 0
    // Jika lebih dari 0, berarti ada data yang masih kosong
    if($kosong > 0){
    ?>  
      <script>
      $(document).ready(function(){
        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
        $("#jumlah_kosong").html('<?php echo $kosong; ?>');
        
        $("#kosong").show(); // Munculkan alert validasi kosong
      });
      </script>
    <?php
    }else{ // Jika semua data sudah diisi
      echo "<hr>";
      
      // Buat sebuah tombol untuk mengimport data ke database
      echo "<button type='submit' name='import'>Import</button>";
      echo "<a href='".base_url("mahasiswa/InputMhs")."'>Cancel</a>";
    }
    
    echo "</form>";
  }
  ?>
</body>
</html>