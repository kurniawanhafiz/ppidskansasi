<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
  $id = mysqli_real_escape_string($koneksi, $_POST['id']);
  $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
  $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

  // Cek apakah ID sudah ada
  $cek = mysqli_query($koneksi, "SELECT * FROM informasi_jurusan WHERE id='$id'");
  if (mysqli_num_rows($cek) > 0) {
    echo "<script>
            alert('ID sudah digunakan! Pilih ID lain.');
          </script>";
  } else {
    $query = "INSERT INTO informasi_jurusan (id, jurusan, deskripsi)
              VALUES ('$id', '$jurusan', '$deskripsi')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
      echo "<script>
              alert('Data berhasil disimpan!');
              window.location='informasi.php';
            </script>";
    } else {
      echo "<script>
              alert('Gagal menyimpan data!');
            </script>";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Input Data Jurusan - PPID SMKN 1 Sijunjung</title>

  <link href="./assets/bootstrap538/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="./assets/css/input_data.css" rel="stylesheet"/>
  <link href="./assets/img/logo-smkn1sjj.png" rel="icon" />

</head>
<body>


  <section class="hero">
    <div class="container">
      <h1 class="fw-bold mb-4">Tambah Data Jurusan</h1>

<form method="POST" class="input-form mx-auto" style="max-width:600px; text-align:left;">
  <div class="mb-3">
    <label for="id" class="form-label fw-semibold">ID</label>
    <input type="number" class="form-control" id="id" name="id" required>
  </div>

  <div class="mb-3">
    <label for="jurusan" class="form-label fw-semibold">Nama Jurusan</label>
    <input type="text" class="form-control" id="jurusan" name="jurusan" required>
  </div>

  <div class="mb-3">
    <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required></textarea>
  </div>

  <div class="d-flex justify-content-between mt-4">
    <a href="informasi.php" class="btn-kembali">← Kembali</a>
    <button type="submit" name="simpan" class="btn-simpan">Simpan</button>
  </div>
</form>

    </div>
  </section>

  <script src="./assets/bootstrap538/js/bootstrap.bundle.min.js"></script>
</body>
</html>
