<?php
require_once '../layout/_top.php';
require_once '../app.php';

$result = mysqli_query($db, "SELECT * FROM buku");
$books = querySql("SELECT * FROM buku ORDER BY id_buku ASC");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List Buku</h1>
  </div>
  <div class="row">
            <?php foreach ($books as $book) : ?>
                <div class="col-md-3">
                    <div class="card mt-4">
                        <img src="https://placeimg.com/320/250/nature" width="100%" alt="">
                        <div class="card-body">
                            <div class="card-title">
                                <h6><?= $book["judul_buku"]; ?></h6>
                            </div>
                            <p class="badge bg-info"><?= $book["kategori_buku"]; ?></p>
                            <p class="text-justify text-truncate" style="max-width: 250px;"><?= $book["deskripsi_buku"]; ?></p>
                            <a href="detailbook.php?id=<?= $book["id_buku"]; ?>" class="btn btn-info btn-sm">Baca Lebih Lanjut</a>
                        </div>
                        <div class="card-footer">
                            <span>Pembuat: <?= $book["pembuat_buku"]; ?></span>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>
<script src="../assets/js/page/modules-datatables.js"></script>