<?php
    require("koneksi.php");
    session_start();
    $nim = $_SESSION['nim'];
    $sql = $conn  -> prepare("SELECT * FROM posting WHERE nim = '$nim'");
    $sql -> execute();
    $data = $sql -> fetch(PDO::FETCH_ASSOC);
?>
<html>
<form action="prosposting.php" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <th>Edit</th>
        </tr>
        <tr>
            <td><textarea name="post"><?php echo $data['post']?></textarea></td>
        </tr>
        <tr>
            <td>Upload : <input type="file" name="pict" value="<?php echo $data['pict']?>"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Simpan"></td>
            <td><a href="beranda.html">Ke Halaman Utama</a></td>
        </tr>
        </table>
    </form>
</html>
<?php
    if (isset($_POST['post'])) {
        $cerita = $_POST['post'];
        $pict = $_POST['pict'];
        
        $sql= $pdo -> prepare("UPDATE posting SET post = '$post', pict='$pict' WHERE nim ='$nim'");
        $sql -> execute();
        if($sql){
            ?>
            <script>
            alert("Data berhasil diubah");
            location = "postinganku.php";
        </script>
        <?php
        }
    }
?>