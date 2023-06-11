<?php 
require('../app.php');
// Logic Create Book
if (isset($_POST["createBook"])) {
    if (createBook($_POST) > 0) {
        echo "<script>
            alert('Berhasil Menambahkan Buku Baru!');
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
    <h1>Tambah Buku</h1>
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
          <form method="POST">
            <table cellpadding="8" class="w-100">
              <tr>
                <td>Judul Buku</td>
                <td><input class="form-control" type="text" name="judul_buku" id="judul_buku"></td>
              </tr>
              <tr>
                <td>Pembuat Buku</td>
                <td><input class="form-control" type="text" name="pembuat_buku" id="pembuat_buku"></td>
              </tr>
              <tr>
                <td>Kategori Buku</td>
                <td>
                  <select class="form-control" name="kategori_buku" id="kategori_buku" required>
                  <option hidden>Pilih Kategori Bukunya</option>
                                <option value="Novel">Novel</option>
                                <option value="Edukasi">Edukasi</option>
                                <option value="Drama">Drama</option>
                                <option value="School">School</option>
                                <option value="Tabloid">Tabloid</option>
                                <option value="Religion">Religion</option>
                  </select>
                </td>
              </tr>
                <td>Deskripsi Buku</td>
                <td><textarea name="deskripsi_buku" id="deskripsi_buku" cols="30" rows="2" class="form-control"></textarea></td>
              </tr>
              <tr>
                <td>
                  <input class="btn btn-primary" type="submit" name="createBook" value="Simpan">
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>