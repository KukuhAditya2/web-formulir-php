<?php

include("config.php");

if(isset($_POST['simpan'])){

  // Data dari form
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $jk = $_POST['jenis_kelamin'];
  $agama = $_POST['agama'];
  $sekolah = $_POST['sekolah_asal'];

  // Siapkan query update
  $sql = "UPDATE calon_siswa
          SET nama=:nama,  
          alamat=:alamat, 
          jenis_kelamin=:jk,
          agama=:agama,
          sekolah_asal=:sekolah  
          WHERE id=:id";

  // Prepare statement
  $stmt = oci_parse($conn, $sql);

  // Binding
  oci_bind_by_name($stmt, ':id', $id);
  oci_bind_by_name($stmt, ':nama', $nama);
  oci_bind_by_name($stmt, ':alamat', $alamat);
  oci_bind_by_name($stmt, ':jk', $jk);
  oci_bind_by_name($stmt, ':agama', $agama);
  oci_bind_by_name($stmt, ':sekolah', $sekolah);
  
  // Eksekusi 
  $result = oci_execute($stmt);

  // Cek hasil
  if($result){ 
    header("Location: list_siswa.php");
  } else {
    $error = oci_error($conn);
    echo $error['Gagal menyimpan perubahan...'];
  }  

} else {
  die("Akses tidak diizinkan!");
}

oci_close($conn);

?>