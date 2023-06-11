<?php
require('../app.php');

// Logic Edit User
if (isset($_POST["update"])) {
    if (editUser($_POST) > 0) {
        echo "<script>
            alert('Berhasil Mengubah Data Anggota!');
            location='index.php';
        </script>";
    } else {
        echo "<script>
            alert('Kesalahan Jaringan');
            location='index.php';
        </script>";
    }
}

// Mendapatkan ID pengguna dari parameter URL
$id = $_GET['id'];

// Query untuk mendapatkan data pengguna berdasarkan ID
$queryUser = "SELECT * FROM users WHERE id = '$id'";
$resultUser = mysqli_query($db, $queryUser);
$userData = mysqli_fetch_assoc($resultUser);

// Jika data pengguna tidak ditemukan, kembalikan ke halaman index.php
if (!$userData) {
    header("location: index.php");
    exit;
}

require 'layouts/_top.php';
?>

<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>Edit Anggota</h1>
        <a href="./index.php" class="btn btn-light">Kembali</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?php isset($_COOKIE["error_form"]) ? $errorForm = $_COOKIE["error_form"] : $errorForm =  null  ?>
                    <?php if ($errorForm) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $errorForm; ?>
                        </div>
                    <?php endif; ?>
                    <!-- // Form -->
                    <form method="POST" action="" enctype="multipart/form-data" class="needs-validation" novalidate="">
                        <input type="hidden" name="id" value="<?= $userData['id']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input id="nama" type="text" class="form-control" name="nama" tabindex="1" value="<?= $userData['nama']; ?>" required autofocus>
                            <div class="invalid-feedback">
                                Mohon isi Nama Lengkap
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="text" class="form-control" name="email" tabindex="1" value="<?= $userData['email']; ?>" required autofocus>
                            <div class="invalid-feedback">
                                Mohon Isi Email dengan benar
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Password</label>
                            </div>
                            <input id="password" type="password" class="form-control" name="password" tabindex="2" autocomplete="off">
                            <div class="invalid-feedback">
                                Mohon isi kata sandi
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Prodi</label>
                            <select name="prodi" class="form-select" id="prodi">
                                <option hidden>Pilih Prodi/Jurusan</option>
                                <option value="1" <?php if ($userData['id_prodi'] == 1) echo 'selected'; ?>>Teknik Industri</option>
                                <option value="2" <?php if ($userData['id_prodi'] == 2) echo 'selected'; ?>>Teknologi Pangan</option>
                                <option value="3" <?php if ($userData['id_prodi'] == 3) echo 'selected'; ?>>Teknik Mesin</option>
                                <option value="4" <?php if ($userData['id_prodi'] == 4) echo 'selected'; ?>>Teknik Informatika</option>
                                <option value="5" <?php if ($userData['id_prodi'] == 5) echo 'selected'; ?>>Teknik Lingkungan</option>
                                <option value="6" <?php if ($userData['id_prodi'] == 6) echo 'selected'; ?>>Perancangan Wilayah Kota</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select" id="jenis_kelamin">
                                <option hidden>Jenis Kelamin</option>
                                <option value="Lelaki" <?php if ($userData['jenis_kelamin'] == 'Lelaki') echo 'selected'; ?>>Pria</option>
                                <option value="Perempuan" <?php if ($userData['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Wanita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" id="foto" name="foto">
                        </div>
                        <div class="form-group">
                            <button name="update" type="submit" class="btn btn-primary btn-lg btn-block" tabindex="3">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once 'layouts/_bottom.php';
?>
