<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran Siswa Baru | SMK Coding</title>
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
  padding: 20px;
}

h3 {
  font-size: 24px;
}

h1 {
  font-size: 48px;
  margin-top: 0;
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

p {
  margin-bottom: 20px;
}

.error_handler {
	text-align: center;
	margin: 0;
	color: red;
	font-style: italic;
}

<?php if(isset($_GET['status'])): ?>
p {
  color: red;
}
<?php endif; ?>

<?php if($_GET['status'] == "sukses"): ?>
.error_handler {
  color: black;
  font-style: normal;
}
<?php endif; ?>


</style>

<body>
	<header>
		<h3>Pendaftaran Siswa Baru</h3>
		<h1>SMK Coding</h1>
	</header>
	<nav>
		<ul>
			<li><a href="form_daftar.php">Daftar Baru</a></li>
			<li><a href="list_siswa.php">Pendaftar</a></li>
		</ul>
	</nav>
	
	
	<?php if(isset($_GET['status'])): ?>
	<p>
		<?php
			$data = '';
			if($_GET['status'] == 'sukses'){
				$data = "Pendaftaran siswa baru berhasil !";
			} else {
				$data = "Pendaftaran gagal !!!";
			}
		?>

		<h1 class="error_handler"><?php echo $data ?></h1>
	</p>
	<?php endif; ?>
	
	</body>
</html>
