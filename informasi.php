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
  <link href="./assets/img/logo-smkn1sjj.png" rel="icon"/>
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

<?php
session_start();
if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?= $_SESSION['success']; ?>
    </div>
<?php unset($_SESSION['success']); endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?= $_SESSION['error']; ?>
    </div>
<?php unset($_SESSION['error']); endif; ?>

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
      <a href="edit_data.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
 <!--     <a href="hapus_data.php?id=" class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin mau hapus data ini?\")'>Hapus</a> -->
          <button 
      class="btn btn-danger btn-sm" 
      data-bs-toggle="modal" 
      data-bs-target="#confirmDeleteModal" 
      data-id="<?= $data['id'] ?>">
      Hapus
    </button>
  </td>
</tr>
<?php
endwhile;
?>
  </table>
      </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color:#1a1a1a; color:#f5f5f5; border:1px solid #333;">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold">Konfirmasi Hapus</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Yakin mau hapus data ini? Tindakan ini tidak bisa dibatalkan.
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <a href="#" id="btn-delete-confirm" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>

  </section>

<!-- ===== FOOTER ===== -->
<footer class="footer-modern">
  <p>© 2025 PPID SMK Negeri 1 Sijunjung — Dibuat oleh 
     <span class="footer-author">Kurniawan Hafiz</span>
  </p>
</footer>

  <script src="./assets/bootstrap538/js/bootstrap.bundle.min.js"></script>
  <script>
  const deleteModal = document.getElementById('confirmDeleteModal');
  const deleteBtn = document.getElementById('btn-delete-confirm');

  deleteModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget; // tombol yang diklik
    const id = button.getAttribute('data-id');
    deleteBtn.href = `hapus_data.php?id=${id}`;
  });
</script>

</body>
</html>
