<?php
session_start();
require('../app.php');

if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
}

$role = $_SESSION["role"];

if ($role !== "admin") {
    header("Location: ../index.php");
}

?>

<?php
require_once '../layout/_top.php';
?>


<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>History Peminjaman</h1>
    <a href="#" class="btn btn-light" onclick="printData()">Print Data</a>
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
                  <th>Prodi</th>
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

                  <input type="hidden" name="id" value="<?= $row['id'] ?>">
                  <tr class="text-center">
                    <td><?= $nomor++; ?></td>
                    <td><?= $pinjeman["nama"]; ?></td>
                    <td><?= $pinjeman["id_prodi"]; ?></td>
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
                            <a href="accept.php?id=<?= $pinjeman["id_pinjam"]; ?>" class="badge bg-success rounded-pill text-decoration-none">Dikembalikan</a>
                            <a href="reject.php?id=<?= $pinjeman["id_pinjam"]; ?>" class="badge bg-danger rounded-pill text-decoration-none">Hilang</a>
                        <?php endif; ?>
                    </td>
                    <td><?= date("d-M-Y", strtotime($pinjeman["tanggal_pinjam"])); ?></td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>
<!-- Page Specific JS File -->
<script>
  function printData() {
    var table = document.getElementById("table-1").outerHTML;
    var printWindow = window.open('', '_blank');
    printWindow.document.open();
    printWindow.document.write('<html><head><title>Print</title></head><body>' + table + '</body></html>');
    printWindow.document.close();
    printWindow.print();
  }
</script>
