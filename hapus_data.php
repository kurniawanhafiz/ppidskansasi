<?php
session_start();
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Cek apakah data dengan ID itu ada
    $cek = mysqli_query($koneksi, "SELECT * FROM informasi_jurusan WHERE id='$id'");
    if (mysqli_num_rows($cek) > 0) {

        // Eksekusi hapus data
        $hapus = mysqli_query($koneksi, "DELETE FROM informasi_jurusan WHERE id='$id'");

        if ($hapus) {
            $_SESSION['success'] = "Data berhasil dihapus!";
        } else {
            $_SESSION['error'] = "Gagal menghapus data. Coba lagi.";
        }

    } else {
        $_SESSION['error'] = "Data tidak ditemukan.";
    }
} else {
    $_SESSION['error'] = "Parameter ID tidak ditemukan.";
}

// Arahkan balik ke halaman informasi
header("Location: informasi.php");
exit();
?>
