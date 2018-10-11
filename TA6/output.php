<?php
    include("koneksi.php");
    if (isset($_POST['simpan'])) {
        $nama       = $_POST['nama'];
		$nim        = $_POST['nim'];
		$kelas  = $_POST['kelas'];
		$jenkel  = $_POST['jenkel'];
		$hobi  = $_POST['hobi'];
		$fak  = $_POST['fak'];
		$alamat  = $_POST['alamat'];
        $query = $conn -> prepare("INSERT INTO siswa(nama, nim, kelas, jenkel, hobi, fak, alamat) VALUE 
        	('$nama','$nim','$kelas', '$jenkel', '$hobi', '$fak', '$alamat')");
        $query -> execute();
        if ($query) {
            ?>
            <script>
                alert("Data berhasil tersimpan <br> Anda akan dialihkan ke halaman login");
                location = "login.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Data tidak tersimpan");
            </script>
            <?php
        }
    }
?>
