<?php
session_start();
require('../app.php');
require('layouts/_top.php');
if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
}

$role = $_SESSION["role"];
if ($role !== "member") {
    header("Location: ../index.php");
}


if (isset($_POST["checkoutBuku"])) {
    if (createCheckout($_POST) > 0) {
        header("Location: index.php");
    } else {
        echo mysqli_error($db);
    }
}

if (empty($_SESSION["keranjang"]) || !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang masih kosong belanja dulu yu!'); location='booklist.php';</script>";
}

?>

<style>
    .container {
        margin-top: 2rem;
    }
</style>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Form Peminjaman</h1>
  </div>
    <div class="container my-4">
        <div class="row mt-6">
            <div class="col-md-6 mt-4">
                <h2>Pinjam Buku</h2>
                <div class="card">
                    <div class="card-body">
                        <?php
                        $totalBelanjaBuku = 0;
                        foreach ($_SESSION["keranjang"] as $checkoutId => $result) : ?>
                            <?php $data = querySql("SELECT * FROM buku WHERE id_buku = '$checkoutId'"); ?>
                            <?php if (!empty($data)) : ?>
                                <?php $data = $data[0]; ?>
                                <div class="card-title">
                                    <h5><?= $data["judul_buku"]; ?></h5>
                                    <h5>Total Buku: <?= $result; ?></h5>
                                </div>
                                <hr>
                                <?php $totalBelanjaBuku; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <?php isset($_COOKIE["error_validation_checkout"]) ? $error_checkout = $_COOKIE["error_validation_checkout"] : $error_checkout = null ?>
                <?php if ($error_checkout) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error_checkout ?>
                    </div>
                <?php endif; ?>
                <form method="post">
                    <div class="form-group">
                        <label for="nama" class="form-label">Nama Peminjam</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $_SESSION["nama"]; ?>" readonly>
                    </div>
                    <div class="form-group mt-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?= $_SESSION["email"]; ?>" readonly>
                    </div>
                    <?php if (!empty($data)) : ?>
                        <div class="form-group mt-2">
                            <label for="nama_buku" class="form-label">Judul Buku</label>
                            <input type="text" name="nama_buku" id="nama_buku" class="form-control" value="<?= $data["judul_buku"]; ?>" readonly>
                        </div>
                    <?php endif; ?>
                    <div class="form-group mt-2">
                        <label for="no_telp" class="form-label">Nomor Telephone Aktif</label>
                        <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="Nomor Telephone yang aktif ya!">
                    </div>
                    <div class="form-group mt-2">
                          <label for="durasi_pinjaman" class="form-label">Durasi Peminjaman</label>
                          <select name="durasi_pinjaman" id="durasi_pinjaman" class="form-select">
                         <?php $enumValues = ['3 Hari', '7 Hari', '30 Hari']; // Ganti dengan nilai ENUM yang sesuai dengan tabel pinjam ?>
                        <?php foreach ($enumValues as $value) : ?>
                        <option value="<?= $value; ?>"><?= $value; ?></option>
                         <?php endforeach; ?>
                          </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="harga_buku" class="form-label">Alamat Lengkap</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control" placeholder="Alamat lengkap nya jangan sampai salah ya!"></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" name="checkoutBuku" class="btn btn-outline-info mt-3">Mulai Meminjam</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require('layouts/_bottom.php'); ?>
