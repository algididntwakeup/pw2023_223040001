<?php
session_start();
require 'layouts/_top.php';
require_once '../app.php';

$bookId = $_GET["id"];

$findOneBook = querySql("SELECT * FROM buku WHERE id_buku = $bookId")[0];
?>

<!-- Tampilan detail buku -->

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Detail Buku</h1>
  </div>
  <div class="row">
    <div class="col-md-3 mx-auto">
      <div class="card mt-4" style="width: 20rem;">
        <img src="https://placeimg.com/640/480/nature" width="100%" alt="Detail Picture <?= $findOneBook["judul_buku"]; ?>">
        <div class="card-body">
          <div class="card-title">
            <span class="badge bg-info rounded-pill"><?= $findOneBook["kategori_buku"]; ?></span>
            <h6 class="mt-2"><?= $findOneBook["judul_buku"] ?></h6>
            <p class="text-muted"><?= $findOneBook["deskripsi_buku"] ?></p>
            <div class="d-flex justify-content-between align-items-center">
              <a href="minjam.php?id=<?= $findOneBook["id_buku"]; ?>" class="badge bg-success text-decoration-none">Mulai Pinjam</a>
            </div>
          </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
          <small><?= $findOneBook["pembuat_buku"]; ?></small>
          <small><?= date("d-M-y", strtotime($findOneBook["rilis_buku"])); ?></small>
        </div>
      </div>
    </div>
  </div>
</section>





