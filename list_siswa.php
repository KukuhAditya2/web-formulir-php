<?php 

include("config.php");

$sql = "SELECT * FROM calon_siswa";

$stmt = oci_parse($conn, $sql);
oci_execute($stmt);

// Define kolom-kolom yang akan di-fetch
oci_define_by_name($stmt, 'ID', $id); 
oci_define_by_name($stmt, 'NAM', $nama);
oci_define_by_name($stmt, 'ALAMAT', $alamat);
oci_define_by_name($stmt, 'JENIS_KELAMIN', $jenis_kelamin);
oci_define_by_name($stmt, 'AGAMA', $agama);
oci_define_by_name($stmt, 'SEKOLAH_ASAL', $sekolah_asal);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<style>

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
}

header {
    background-color: #333;
    color: #fff;
    padding: 15px;
    text-align: center;
}

nav {
  display: flex;
  justify-content: space-between;
    background-color: #555;
    padding: 10px;

  }

nav a {
    color: #fff;
    text-decoration: none;
    padding: 5px 10px;
    margin-right: 10px;
    border-radius: 3px;
}

nav a:hover {
    background-color: #777;
}

table {
    width: 70%; /* Lebar tabel setengah dari parent */
    margin: 20px auto; /* Posisikan tabel ke tengah secara horizontal */
    border-collapse: collapse;
}

table th, table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

table th {
    background-color: #333;
    color: #fff;
}

table tr:hover {
    background-color: #f5f5f5;
}

table td a {
    text-decoration: none;
    color: #333;
}

table td a:hover {
    text-decoration: underline;
    color: #555;
}

p {
    margin-top: 10px;
}

/* Style untuk tombol Edit dan Hapus */
table td a {
    text-decoration: none;
    padding: 5px 10px;
    margin-right: 5px;
    border-radius: 3px;
}

table td a.edit {
    background-color: #4CAF50;
    color: #fff;
}

table td a.edit:hover {
    background-color: #45a049;
}

table td a.delete {
    background-color: #f44336;
    color: #fff;
}

table td a.delete:hover {
    background-color: #d32f2f;
}

/* Gaya untuk form */
form {
    width: 50%;
    margin: 0 auto;
}

  table tfoot {
        text-align: center;
        /* width: 100%; */
        background-color: #ddd;
    }

    table tfoot td {
        padding: 5px;
        border: 1px solid #ddd;
    }

    p.total {
      
        margin: 0;
    }

    .hapus {
      color: red;
    }

    .hapus:hover {
      text-decoration: underline;
      color: red;
    }

    .kembali, .tambah_baru {
      font-size: 22px;
    }

</style>

<body>

<header>
  <h3>Siswa yang sudah mendaftar</h3>  
</header>

<nav>
  <a class="kembali" href="index.php"><< Kembali</a>
  <a class="tambah_baru" href="form_daftar.php">[+] Tambah Baru</a> 
</nav>

<br>

<table>
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Jenis Kelamin</th>
      <th>Agama</th>
      <th>Sekolah Asal</th>
      <th>Tindakan</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = oci_fetch_assoc($stmt)): ?>
      <tr>
        <td><?php echo $row['ID']; ?></td>
        <td><?php echo $row['NAMA']; ?></td>
        <td><?php echo $row['ALAMAT']; ?></td>
        <td><?php echo $row['JENIS_KELAMIN']; ?></td>
        <td><?php echo $row['AGAMA']; ?></td>
        <td><?php echo $row['SEKOLAH_ASAL']; ?></td>
        <td>
          <a href="form_edit.php?id=<?php echo $row['ID']; ?>">Edit</a> |
          <a class="hapus" href="hapus.php?id=<?php echo $row['ID']; ?>">Hapus</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
  <tfoot>
      <tr>
        <td><p>Total: <?php echo oci_num_rows($stmt); ?></p></td>
      </tr>
      </tfoot>
</table>




<?php

oci_free_statement($stmt);
oci_close($conn);

?>

</body>
</html>