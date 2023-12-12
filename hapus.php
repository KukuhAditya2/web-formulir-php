<?php

include("config.php");

if( isset($_GET['id']) ) {

  // Ambil id
  $id = $_GET['id'];

  // Siapkan query
  $sql = "DELETE FROM calon_siswa WHERE id = :id";

  // Prepare statement
  $stmt = oci_parse($conn, $sql);

  // Binding
  oci_bind_by_name($stmt, ':id', $id);

  // Eksekusi
  $result = oci_execute($stmt);

  // Cek hasil
  if($result) {
    oci_commit($conn); 
    header('Location: list_siswa.php');
  } else {        
    $error = oci_error($conn);
    echo $error['Gagal menghapus...'];
  }

} else {
  die("Akses tidak diizinkan!");
}

oci_close($conn);

?>