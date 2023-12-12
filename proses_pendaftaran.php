<?php

// Include file config database 
include("config.php");

// Cek apakah form sudah submitted
if(isset($_POST['daftar'])){

  // Ambil data dari form
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $jk = $_POST['jenis_kelamin'];
  $agama = $_POST['agama'];
  $sekolah = $_POST['sekolah_asal'];

  // Siapkan query
  $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal) 
  VALUES (:nama, :alamat, :jk, :agama, :sekolah)";

  // Prepare statement
  $stmt = oci_parse($conn, $sql);

  // Bind parameter
  oci_bind_by_name($stmt, ':nama', $nama);
  oci_bind_by_name($stmt, ':alamat', $alamat); 
  oci_bind_by_name($stmt, ':jk', $jk);
  oci_bind_by_name($stmt, ':agama', $agama);
  oci_bind_by_name($stmt, ':sekolah', $sekolah);

  // Eksekusi query 
  $result = oci_execute($stmt); 

  if($result) {
    // Sukses
    $message = "sukses";
  } else {
    // Gagal
    $message = "gagal";
  }

  // Redirect ke halaman index
  header("Location: index.php?status=" . $message);

} else {  
  die("Akses tidak diizinkan!"); 
}

// Tutup koneksi
oci_close($conn);

?>