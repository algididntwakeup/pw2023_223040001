<?php
require('../app.php');
session_start();
$role = $_SESSION["role"];

if ($role !== "member") {
    echo "<script>alert('Maaf anda tidak bisa akses!'); location='../index.php';</script>";
}

?>

<?php require_once('layouts/_top.php'); ?>

<style>
    .container {
        margin-top: 2rem;
    }
</style>

<?php if (empty($_SESSION["keranjang"]) || !isset($_SESSION["keranjang"])) : ?>
    <section class="section">
  <div class="section-header">
    <h1>Keranjang Peminjaman</h1>
  </div>
  <div class="container">
  <div class="row">
    <div class="col-12 text-center mt-5">
      <h2 class="mb-4">Waduh, Listnya Masih Kosong nih</h2>
      <a href="booklist.php" class="btn btn-primary">Minjem buku dulu yu!</a>
    </div>
  </div>
</div>


    </div>
<?php endif; ?>

<?php if (isset($_SESSION["keranjang"])) : ?>
    <section class="section">
    <div class="container">
        <div class="row mt-5">
            <div class="col mt-4">
                <div class="card">
                    <?php $totalcart = 0; ?>
                    <?php foreach ($_SESSION["keranjang"] as $bookid => $hasil) :  ?>
                        <?php $data = querySql("SELECT * FROM buku WHERE id_buku = $bookid"); ?>
                        <?php if (!empty($data)) : ?>
                            <?php $data = $data[0]; ?>
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="mx-4">
                                        <div class="card-title mb-5">
                                            <h5 class="badge bg-info"><?= $data["kategori_buku"]; ?></h5>
                                            <h5><small> <?= $data["judul_buku"]; ?></small></h5>
                                            <h5><small>Total Buku: <?= $hasil; ?></small></h5>
                                            <h5><small><?= $data["deskripsi_buku"]; ?></small>:</h5>
                                            <a href="delete-cart.php?id=<?= $data["id_buku"]; ?>" class="btn btn-outline-danger btn-sm">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        <?php endif; ?>
                        <?php $totalcart; ?>
                    <?php endforeach;  ?>
                    <?php if (empty($_SESSION["keranjang"]) || !isset($_SESSION["keranjang"])) : ?>
                    <?php else : ?>
                        <a href="cekout.php" class="btn btn-outline-success btn-sm mx-3 my-2 text-decoration-none fw-bold">Pinjam</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php require_once('layouts/_bottom.php'); ?>
