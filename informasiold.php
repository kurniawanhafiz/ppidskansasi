<?php

include "koneksi.php";

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Informasi Jurusan - PPID SMK Negeri 1 Sijunjung</title>

  <link href="./assets/bootstrap538/css/bootstrap.min.css" rel="stylesheet"/>

  <link href="./assets/css/informasi.css" rel="stylesheet"/>
  
  <link href="./assets/img/logo-smkn1sjj.png" rel="icon" />
</head>
<body>

  <nav class="navbar navbar-expand-lg fixed-bottom shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="./assets/img/logo-smkn1sjj.png" alt="Logo" width="35" class="me-2">
        PPID SMKN 1 Sijunjung
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
          <li class="nav-item"><a class="nav-link active" href="informasi.php">Informasi Jurusan</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="hero">
    <div class="container">
      <img src="./assets/img/logo-smkn1sjj.png" alt="Logo SMKN 1 Sijunjung" class="hero-logo">
      <h1 class="fw-bold mb-3">Informasi Jurusan</h1>
      <p class="lead mb-4">Daftar jurusan beserta deskripsi di SMK Negeri 1 Sijunjung.</p>

      <div class="d-flex justify-content-between align-items-center mb-3">
  <a href="input_data.php" class="btn-input">+ Input Data</a>
</div>

      <div class="table-responsive">
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Jurusan</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
<?php 
$no = 1;
$tampil = mysqli_query($koneksi, "SELECT * FROM informasi_jurusan ORDER BY id");
while ($data = mysqli_fetch_array($tampil)):
?>
<tr>
  <td><?= $no++ ?></td>
  <td><?= $data["jurusan"] ?></td>
  <td style="text-align:left;"><?= $data["deskripsi"] ?></td>
  <td>
      <a href='edit_data.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
      <a href='hapus_data.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin mau hapus data ini?\")'>Hapus</a>
  </td>
</tr>
<?php
endwhile;
?>
  </table>
      </div>
    </div>
  </section>

  <script src="./assets/bootstrap538/js/bootstrap.bundle.min.js"></script>
</body>
</html>
