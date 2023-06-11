<?php
require_once '../app.php';
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
}

$role = $_SESSION["role"];

if ($role !== "member") {
    header("Location: ../index.php");
}

$user = $_SESSION["nama"];
$orderan = querySql("SELECT * FROM pinjam WHERE nama = '$user'");
if ($orderan == null) {
    echo "<script>alert('Yuk mulai meminjam buku di halaman list buku!'); location='booklist.php';</script>";
}
?>

<?php require_once 'layouts/_top.php'; ?>

<!-- Isi dari halaman index.php -->
<section class="section">
  <div class="section-header">
    <h1>History</h1>
  </div>
  <div class="container">
    <div class="row">
        <div class="col mt-4">
            <h5>Hai <?= $user; ?> ini history pinjaman kamu ya</h5>
            <?php foreach ($orderan as $order) : ?>
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <div class="card-title">
                            <h5>ID Peminjaman: <?= $order["id_pinjam"]; ?></h5>
                            <h5> <?= $order["nama"]; ?></h5>
                            <h5> <?= $order["nama_buku"]; ?></h5>
                            <span>Status:</span>
                            <?php if ($order["status_buku"] == "Dipinjam") : ?>
                                <small class="badge bg-primary text-light"> <?= $order["status_buku"]; ?></small>
                            <?php elseif ($order["status_buku"] == "Hilang") : ?>
                                <small class="badge bg-danger"> <?= $order["status_buku"]; ?></small>
                            <?php elseif ($order["status_buku"] == "Dikembalikan") : ?>
                                <small class="badge bg-success"> <?= $order["status_buku"]; ?></small>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col mt-4">
            <?php if ($order["status_buku"] === "pending") : ?>
                <h5 class="text-center">Selamat Membaca :D</h5>
            <?php elseif ($order["status_buku"] === "reject") : ?>
                <h5 class="text-center">Waduh, Lain kali lebih berhati-hati yaa kalo meminjam buku :/</h5>
            <?php elseif ($order["status_buku"] === "accept") : ?>
                <h5 class="text-center">Terimakasih Telah Meminjam :D</h5>
            <?php endif; ?>
        </div>
    </div>
</div>
</section>

<?php require_once 'layouts/_bottom.php'; ?>