<?php 
$server = "localhost";
$database = "jurnal";
$username = "root";
$pass = "";
try {
    $conn = new PDO("mysql:host=$server;dbname=$database", $username);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Gagal: " . $e->getMessage();
    }
?>