<?php
require('../app.php');

// if (!isset($_SESSION["user"])) {
//     header("Location: ../login.php");
// }

// $role = $_SESSION["role"];

// if ($role !== "admin") {
//     header("Location: ../index.php");
// }

?>

<?php
require_once '../layout/_top.php';
?>


<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>History Peminjaman</h1>
    <a href="printout.php" id="printButton" class="btn btn-light" target="_blank">Print Data</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
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
                  <th style="width: 150">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
                    $nomor = 1;
                    $dataMinjem = querySql("SELECT * FROM pinjam"); ?>
                    <?php foreach ($dataMinjem as $pinjeman) : ?>

                      <input type="hidden" name="id" value="<?= $pinjeman['id_pinjam'] ?>">

                  <tr class="text-center">
                    <td><?= $nomor++; ?></td>
                    <td><?= $pinjeman["nama"]; ?></td>
                    <td><?= $pinjeman["nama_buku"]; ?></td>
                            <td><?= $pinjeman["email"]; ?></td>
                            <td><?= $pinjeman["no_telp"]; ?></td>
                            <td><?= $pinjeman["alamat"]; ?></td>
                            <td>
                                <?php
                                $durasi_pinjaman = $pinjeman["durasi_peminjaman"]; // Ambil nilai ENUM dari database

                                echo $durasi_pinjaman; // Tampilkan nilai ENUM
                                ?>
                            </td>
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
                            <td>
                                <?php if ($pinjeman["status_buku"] !== "Dikembalikan") : ?>
                                    <a href="returned.php?id=<?= $pinjeman["id_pinjam"]; ?>" class="badge bg-success rounded-pill text-decoration-none">Dikembalikan</a>
                                    <a href="missing.php?id=<?= $pinjeman["id_pinjam"]; ?>" class="badge bg-danger rounded-pill text-decoration-none mt-2">Hilang</a>
                                <?php endif; ?>
                            </td>
                                </tr>
                  <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <script>
      // Menangkap klik tombol Print
      document.getElementById("printButton").addEventListener("click", function() {
        // Menggunakan library PrintThis.js untuk mencetak tabel
        $("#table-1").printThis();
      });
    </script>
</section>

<?php
require_once '../layout/_bottom.php';
?>
<!-- Page Specific JS File -->

<script src="../assets/js/page/modules-datatables.js"></script>