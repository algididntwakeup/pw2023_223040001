<?php
require('../app.php');

// Logic Create User
if (isset($_POST["daftar"])) {
    if (createUser($_POST) > 0) {
        echo "<script>
            alert('Berhasil Menambahkan Anggota Baru!');
            location='index.php';
        </script>";
    } else {
        echo "<script>
            alert('Kesalahan Jaringan');
            location='index.php';
        </script>";
    }
}
?>

<?php
require_once '../layout/_top.php';
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Anggota</h1>
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
                  <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input id="nama" type="text" class="form-control" name="nama" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Mohon isi Nama Lengkap
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="text" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Mohon Isi Email dengan benar
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" autocomplete="off" required>
                    <div class="invalid-feedback">
                      Mohon isi kata sandi
                    </div>
                  </div>
                  <div class="form-group">
                        <label for="prodi">Prodi</label>
                        <select name="prodi" class="form-select" id="prodi">
                            <option hidden>Pilih Prodi/Jurusan</option>
                            <option value="1">Teknik Industri</option>
                            <option value="2">Teknologi Pangan</option>
                            <option value="3">Teknik Mesin</option>
                            <option value="4">Teknik Informatika</option>
                            <option value="5">Teknik Lingkungan</option>
                            <option value="6">Perancangan Wilayah Kota</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" id="jenis_kelamin">
                            <option hidden>Jenis Kelamin</option>
                            <option value="Lelaki">Pria</option>
                            <option value="Perempuan">Wanita</option>
                        </select>
                    </div>
                     <div class="form-group">
                         <label for="foto">Foto</label>
                     <input type="file" class="form-control-file" id="foto" name="foto">
                     </div>
                  <div class="form-group">
                    <button name="daftar" type="submit" class="btn btn-primary btn-lg btn-block" tabindex="3">
                      Buat
                    </button>
                  </div>
                </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>
