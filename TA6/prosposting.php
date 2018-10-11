<?php
require("koneksi.php");
    session_start();
if (isset($_POST['post'])) {
    $post = $_POST['post'];
    $nim = $_SESSION['nim'];
    $pict = $_FILES['pict']['name'];
    $tmp_foto = $_FILES['pict']['tmp_name'];
    $dir = 'foto/';
    $target = $dir.$pict;
    $_SESSION['file'] = $target;
    if(!move_uploaded_file($tmp_foto, $target)){
        die("gagal upload");
    }
    header("lihatpostingan.php");
    $query = $conn -> prepare("INSERT INTO posting(post, pict, nim) VALUES ('$post','$target','$nim')");
    $query -> execute();
        if($query)
        header("location:lihatposting.php");
        else{
            die("Tambah Data Gagal");    
        }
}
?>