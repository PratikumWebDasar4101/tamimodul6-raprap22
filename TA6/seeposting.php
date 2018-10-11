<!DOCTYPE html>
<head>
    <title></title>
</head>
<body>
        <table>
            <tr>
                <td>Nim</td>
                <td>Kisah</td>
                <td>Gambar</td>
            </tr>
            <?php
            require("koneksi.php");
            $sql = $conn -> prepare("SELECT nim, post, pict FROM posting");
            $sql -> execute();
            while($data = $sql -> fetch(PDO :: FETCH_ASSOC)){
            ?>
            
            <tr>
                <td><?php echo $data['nim'];?></td>
                <td><?php echo $data["post"];?></td>
                <!-- <td><?php echo $data['pict'];?></td> -->
                <td><img src="<?php echo $data['pict'];?>"></td>
            </tr>
            <?php 
        }
             ?>
        </table>
        <a href="beranda.php">beranda</a>
    </div>
</body>
</html>