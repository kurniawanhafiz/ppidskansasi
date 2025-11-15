<?php
$server   = "localhost:3306";
$user     = "root";
$password = "";
$database = "ppid_smk1";

$koneksi = mysqli_connect($server, $user, $password, $database) or die("Koneksi gagal: " . mysqli_connect_error());
?>