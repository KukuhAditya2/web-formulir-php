<!DOCTYPE html>
<html>
<head>
	<title>Formulir Pendaftaran Siswa Baru | SMK Coding</title>
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
  width: 100%;
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

nav {
  background-color: #ccc;
  padding: 20px;
}

ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

li {
  display: inline-block;
  margin-right: 20px;
}

a {
  color: #000;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
  font-weight: bold;
}

.kembali:hover, .daftar:hover {
	text-decoration: none;
	font-weight: normal;
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

.kembali, .daftar {
      font-size: 22px;
    }

	fieldset {
		border-radius: 10px;
	}

</style>

<body>
	<header>
		<h3>Formulir Pendaftaran Siswa Baru</h3>
	</header>

	<nav>
		
		<a class="kembali" href="index.php"><< Kembali</a>
		<a class="daftar" href="list_siswa.php">List Siswa</a>
		
	</nav>

	
	<form action="proses_pendaftaran.php" method="POST">
		
		<fieldset>
		
		<p>
			<label for="nama">Nama: </label>
			<input class="nama" type="text" name="nama" placeholder="nama lengkap" />
		</p>
		<p>
			<label for="alamat">Alamat: </label>
			<textarea class="nama" name="alamat"></textarea>
		</p>
		<p>
			<label for="jenis_kelamin">Jenis Kelamin: </label><br>
			<label><input class="laki_laki" type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki</label><br>
			<label><input class="perempuan" type="radio" name="jenis_kelamin" value="perempuan"> Perempuan</label>
		</p>
		<p>
			<label for="agama">Agama: </label>
			<select class="agama" name="agama">
				<option>Islam</option>
				<option>Kristen</option>
				<option>Hindu</option>
				<option>Budha</option>
				<option>Atheis</option>
			</select>
		</p>
		<p>
			<label for="sekolah_asal">Sekolah Asal: </label>
			<input class="sekolah_asal" type="text" name="sekolah_asal" placeholder="nama sekolah" />
		</p>
		<p>
			<input type="submit" value="Daftar" name="daftar" />
		</p>
		
		</fieldset>
	
	</form>
	
	</body>
</html>
