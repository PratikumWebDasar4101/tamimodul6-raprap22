<?php
    require("koneksi.php");
    session_start();
    $nim = $_SESSION['nim'];
    $sql = $conn  -> prepare("SELECT * FROM posting WHERE nim = '$nim'");
    $sql -> execute();
    $data = $sql -> fetch(PDO::FETCH_ASSOC);
?>
<html>
<form action="prosesposting.php" method="POST" enctype="multipart/form-data">
    <table align="center">
        <tr>
            <th>Apa yang anda pikirkan sekarang</th>
        </tr>
        <tr>
                <td>
                    Nim: 
                </td>
                <td><input type="text" name="nim" pattern="\d*" maxlength="10" min="0" required value="<?php echo $data['nim'] ?>"></td>
            </tr>
        <tr>
            <td>Kisah: <br></td>
            <td><textarea name="post" ></textarea></td>
        </tr>
        <tr>
            <td>Upload : </td>
            <td><input type="file" name="pict" id="pict"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Submit"></td>
            <td><button><a href="beranda.html" >Beranda</a></button></td>
        </tr>
        </table>
    </form>
</html>