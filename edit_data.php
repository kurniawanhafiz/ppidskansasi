<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // ambil data berdasarkan ID
    $query = mysqli_query($koneksi, "SELECT * FROM informasi_jurusan WHERE id='$id'");

    // kalau query gagal, tampilkan pesan error
    if (!$query) {
        die("Query error: " . mysqli_error($koneksi));
    }

    $data = mysqli_fetch_assoc($query);

    // kalau data kosong (id gak ada di DB)
    if (!$data) {
        die("Data tidak ditemukan untuk ID = $id");
    }

} else {
    die("ID tidak ditemukan di URL.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Data Jurusan</title>
  <link rel="stylesheet" href="./assets/css/edit_data.css">
</head>
<body>
  <h2>Edit Data Jurusan</h2>
  <form method="POST" action="update_data.php">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <label>Nama Jurusan</label>
    <input type="text" name="jurusan" value="<?= $data['jurusan'] ?>" required>

    <label>Deskripsi</label>
    <textarea name="deskripsi" required><?= $data['deskripsi'] ?></textarea>

    <button type="submit" name="update">Simpan Perubahan</button>
  </form>
</body>
</html>
