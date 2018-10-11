<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>Daftar Terlebih Dahulu Sebelum Login</h2>
	<table>
		<form method="POST" >
			<tr>
				<td>
					Nama: 
				</td>
				<td><input type="text" name="nama" maxlength="35" ></td>
			</tr>
			<tr>
				<td>
					Nim: 
				</td>
				<td><input type="number" name="nim" maxlength="10" ></td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="simpan" value="Simpan">
				</td>
			</tr>
		</form>
	</table>
</body>
</html>

<?php 
    include("koneksi.php");
    session_start();
if (isset($_POST['simpan'])) {
	$nama = $_POST['nama'];
	$nim = $_POST['nim'];

	$sql = $conn -> prepare("SELECT * FROM siswa WHERE nama = '$nama' AND nim = '$nim'");
	$sql -> execute();
	$row = $sql -> rowcount();
	if ($row != 0) {
		$_SESSION['nama'] = $nama;
		$_SESSION['nim'] = $nim;
		header("location: beranda.html");		
	}else{
		?>
            <script>
                alert("Password atau nim anda tidak terdaftar");
                location = "login.php";
            </script>
            <?php
	}
}

 ?>