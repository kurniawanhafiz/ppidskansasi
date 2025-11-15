<?php
session_start();
include "koneksi.php";

$id = $_POST['id'];
$jurusan = $_POST['jurusan'];
$deskripsi = $_POST['deskripsi'];

if (mysqli_query($koneksi, "UPDATE informasi_jurusan SET jurusan='$jurusan', deskripsi='$deskripsi' WHERE id='$id'")) {
    $_SESSION['success'] = "Data berhasil diperbarui!";
    header("Location: informasi.php");
    exit();
} else {
    $_SESSION['error'] = "Gagal memperbarui data!";
    header("Location: informasi.php");
    exit();
}
?>
