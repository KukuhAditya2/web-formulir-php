<?php 

include("config.php");

// Cek id
if(!isset($_GET['id'])) {
  header('Location: list_siswa.php');
}

// Ambil id
$id = $_GET['id'];

// Query
$sql = "SELECT * FROM calon_siswa WHERE id=:id"; 

// Prepare statement
$stmt = oci_parse($conn, $sql);

// Bind param
oci_bind_by_name($stmt, ':ID', $id);  

// Execute
oci_execute($stmt);

// Fetch row
$siswa = oci_fetch_assoc($stmt);

// Jika data tidak ditemukan
if(!$siswa) {
  $error = oci_error($conn);
  echo $error['Data tidak ada...'];
  die();
}

// Close connection
oci_free_statement($stmt);
oci_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Formulir Edit Siswa | SMK Coding</title>
</head>

<style>

	body {
  font-family: sans-serif;
  font-size: 16px;
  margin: 0;
  padding: 0;
}

header {
  background-color: #000;
  color: #fff;
  padding: 15px;
}

h3 {
  font-size: 20px;
}

form {
  width: 500px;
  margin: 0 auto;
  padding: 20px;
  /* border: 1px solid #ccc; */
}

/* fieldset {
  padding: 10px;
  border: 1px solid #ccc;
} */

p, label, input, textarea, select {
  margin-bottom: 10px;
}

label {
  font-weight: bold;
}

.nama {
	margin-top: 5px;
  width: 95%;
  padding: 10px;
  border: 1px solid #ccc;
}

.sekolah_asal {
	margin-top: 5px;
	width: 95%;
	padding: 10px;
	border: 1px solid #ccc
}

.agama {
	margin-top: 5px;
}

.laki_laki {
	margin-top: 10px;
}

textarea {
  width: 95%;
  height: 100px;
  padding: 10px;
  border: 1px solid #ccc;
}

select {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
}

.laki_laki, .perempuan {
  margin-right: 5px;
}

input[type="submit"] {
  width: 100%; /* Lebar memenuhi parent */
    background-color: #4CAF50;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

p input[type="submit"]:hover {
    background-color: #45a049;
}


</style>

<body>
	<header>
		<h3>Formulir Edit Siswa</h3>
	</header>
	
	<form action="proses_edit.php" method="POST">
		
		<fieldset>
			
			<input type="hidden" name="id" value="<?php echo $siswa['ID'] ?>" />
		
		<p>
			<label for="nama">Nama: </label>
			<input class="nama" type="text" name="nama" placeholder="nama lengkap" value="<?php echo $siswa['NAMA'] ?>" />
		</p>
		<p>
			<label for="alamat">Alamat: </label>
			<textarea name="alamat"><?php echo $siswa['ALAMAT'] ?></textarea>
		</p>
		<p>
			<label for="jenis_kelamin">Jenis Kelamin: </label><br>
			<?php $jk = $siswa['JENIS_KELAMIN']; ?>
			<label><input class="laki_laki" type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked": "" ?>> Laki-laki</label><br>
			<label><input class="perempuan" type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked": "" ?>> Perempuan</label>
		</p>
		<p>
			<label for="agama">Agama: </label>
			<?php $agama = $siswa['AGAMA']; ?>
			<select class="agama" name="agama">
				<option <?php echo ($agama == 'ISLAM') ? "selected": "" ?>>Islam</option>
				<option <?php echo ($agama == 'KRISTEN') ? "selected": "" ?>>Kristen</option>
				<option <?php echo ($agama == 'HINDU') ? "selected": "" ?>>Hindu</option>
				<option <?php echo ($agama == 'BUDHA') ? "selected": "" ?>>Budha</option>
				<option <?php echo ($agama == 'ATHEIS') ? "selected": "" ?>>Atheis</option>
			</select>
		</p>
		<p>
			<label for="sekolah_asal">Sekolah Asal: </label>
			<input class="sekolah_asal" type="text" name="sekolah_asal" placeholder="nama sekolah" value="<?php echo $siswa['SEKOLAH_ASAL'] ?>" />
		</p>
		<p>
			<input type="submit" value="Simpan" name="simpan" />
		</p>
		
		</fieldset>
		
	
	</form>
	
	</body>
</html>
