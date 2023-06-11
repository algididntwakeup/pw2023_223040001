<?php
require_once '../app.php';
?>

<style>
  body {
    font-family: Arial, sans-serif;
  }

  .logo {
    float: left;
    margin-right: 10px;
  }

  .section-header {
    text-align: center;
    margin-bottom: 20px;
  }

  .table {
    width: 100%;
    border-collapse: collapse;
  }

  .table th,
  .table td {
    border: 1px solid #ddd;
    padding: 8px;
  }

  .table th {
    background-color: #f2f2f2;
  }

  .text-center {
    text-align: center;
  }
</style>

<section class="section">
  <div class="section-header">
  <div class="logo">
      <img src="../assets/img/logo/ULMS.png" alt="logo" width="150">
    </div>
    <h1>Data Peminjaman</h1>
  </div>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr class="text-center">
          <th>No</th>
          <th>Peminjam</th>
          <th>Buku</th>
          <th>Email</th>
          <th>No.Telp</th>
          <th>Alamat</th>
          <th>Durasi Peminjaman</th>
          <th>Status Buku</th>
          <th>Tanggal Peminjaman</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $nomor = 1;
        $dataMinjem = querySql("SELECT *, CASE 
        WHEN durasi_pinjaman = '3 Hari' THEN '3 Hari'
        WHEN durasi_pinjaman = '7 Hari' THEN '7 Hari'
        WHEN durasi_pinjaman = '30 Hari' THEN '30 Hari'
        ELSE 'Durasi tidak diketahui'
      END AS durasi_peminjaman 
      FROM pinjam");
        foreach ($dataMinjem as $pinjeman) :
        ?>
          <tr class="text-center">
            <td><?= $nomor++; ?></td>
            <td><?= $pinjeman["nama"]; ?></td>
            <td><?= $pinjeman["nama_buku"]; ?></td>
            <td><?= $pinjeman["email"]; ?></td>
            <td><?= $pinjeman["no_telp"]; ?></td>
            <td><?= $pinjeman["alamat"]; ?></td>
            <td><?= $pinjeman["durasi_peminjaman"]; ?></td>
            <td>
              <?php if ($pinjeman["status_buku"] === "Dikembalikan") : ?>
                <span class="text-success fw-bold"><?= $pinjeman["status_buku"]; ?></span>
              <?php elseif ($pinjeman["status_buku"] === "Hilang") : ?>
                <span class="text-danger fw-bold"><?= $pinjeman["status_buku"]; ?></span>
              <?php else : ?>
                <?= $pinjeman["status_buku"]; ?>
              <?php endif; ?>
            </td>
            <td><?= date("d-M-Y", strtotime($pinjeman["tanggal_pinjam"])); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>

<script>
  window.onload = function() {
    window.print();
  }
</script>