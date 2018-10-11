<?php
    require("koneksi.php");
    session_start();
    $nim = $_SESSION['nim'];
    $sql = $conn  -> prepare("SELECT * FROM siswa WHERE nim = '$nim'");
    $sql -> execute();
    $data = $sql -> fetch(PDO::FETCH_ASSOC);
    $hobi_terpilih = explode(", ", $data['hobi']);
?>
<table>
	<form method="POST" action="beranda.php">
			<tr>
				<td>
					Nama: 
				</td>
				<td><input type="text" name="nama" maxlength="25" required value="<?php echo $data['nama'] ?>"></td>
			</tr>
			<tr>
				<td>
					Nim: 
				</td>
				<td><input type="text" name="nim" pattern="\d*" maxlength="10" min="0" required value="<?php echo $data['nim'] ?>"></td>
			</tr>
			<tr>
				<td>
					Kelas:
				</td>
				<td>
					<input type="radio" name="kelas" <?php if($data['kelas'] == "01") echo "checked" ?> value="01"> 01
					<input type="radio" name="kelas" <?php if($data['kelas'] == "02") echo "checked" ?> value="02"> 02
					<input type="radio" name="kelas" <?php if($data['kelas'] == "03") echo "checked" ?> value="03"> 03
					<input type="radio" name="kelas" <?php if($data['kelas'] == "04") echo "checked" ?> value="04" pattern="\d*" maxlength="10" min="0" required value="<?php echo $data['nim'] ?>"> 04
				</td>
			</tr>
			<tr>
				<td>
					Jenis Kelamin: 
				</td>
				<td>
					<input type="radio" name="jenkel" <?php if($data['jenkel'] == "Laki-laki") echo "checked" ?> value="Laki-laki">Laki-laki
					<input type="radio" name="jenkel" <?php if($data['jenkel'] == "Perempuan") echo "checked" ?> value="Perempuan">Perempuan
				</td>
			</tr>
			<tr>
				<td>
					Hobi: 
				</td>
				<td>
						<input type="checkbox" name="hobi[]" <?php if(array_search("Tidur", $hobi_terpilih) > -1 ) echo "checked" ?> value="Tidur">Tidur <br>
					    <input type="checkbox" name="hobi[]" <?php if(array_search("Lari", $hobi_terpilih) > -1 ) echo "checked" ?> value="Lari">Lari <br>
						<input type="checkbox" name="hobi[]" <?php if(array_search("Nonton", $hobi_terpilih) > -1 ) echo "checked" ?> value="Nonton">Nonton<br>
						<input type="checkbox" name="hobi[]" <?php if(array_search("Membaca", $hobi_terpilih) > -1 ) echo "checked" ?> value="Membaca">Membaca <br>
						<input type="checkbox" name="hobi[]" <?php if(array_search("Bersepeda", $hobi_terpilih) > -1 ) echo "checked" ?> value="Bersepeda" value="<?php echo $data['hobi'] ?>">Bersepeda <br>
				</td>
			</tr>
			<tr>
				<td>Fakultas:</td>
				<td>
					<select name="fak" value="<?php echo $data['fakultas'] ?>">
						<option <?php if($data['fak'] == "FIT" ) echo "selected" ?> value="FIT">FIT</option>
						<option <?php if($data['fak'] == "FIK" ) echo "selected" ?> value="FIK">FIK</option>
						<option <?php if($data['fak'] == "FIF" ) echo "selected" ?> value="FIF">FIF</option>
						<option <?php if($data['fak'] == "FEB" ) echo "selected" ?> value="FEB">FEB</option>
						<option <?php if($data['fak'] == "FKB" ) echo "selected" ?> value="FKB">FKB</option>
						<option <?php if($data['fak'] == "FTE" ) echo "selected" ?> value="FTE">FTE</option>
						<option <?php if($data['fak'] == "FRI" ) echo "selected" ?> value="FRI">FRI</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					Alamat: 
				</td>
				<td><textarea name="alamat"><?php echo $data['alamat']?></textarea></td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="simpan" value="Simpan">
				</td>
				<td>
					<button><a href="beranda.html" >Beranda</a></button>
				</td>
			</tr>
		</form>

</table>
<?php
    if (isset($_POST['nim'])) {
        $nama =$_POST['nama'];
        $nim =$_POST['nim'];
        $jenkel =$_POST['jenkel'];
        $fak = $_POST['fak'];
        $kelas = $_POST['kelas'];
        $hobi = $_POST['hobi'];
        $alamat = $_POST['alamat'];
        $list_hobi =implode(", " ,$hobi);
        $sql= $conn -> prepare("UPDATE siswa SET nama = '$nama', jenkel='$jenkel',fak='$fak', kelas='$kelas', hobi='$list_hobi', alamat='$alamat' WHERE nim ='$nim'");
        $sql -> execute();
        if($sql){
            ?>
            <script>
            alert("data berhasil diubah");
            location = "edit.php";
        </script>
        <?php
        }
    }
?>



