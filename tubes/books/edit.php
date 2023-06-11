<?php

require('../app.php');


$id = $_GET["id"];

$book = querySql("SELECT * FROM buku WHERE id_buku = $id")[0];

if (isset($_POST["editBook"])) {
    if (editBook($_POST, $id) > 0) {
        echo "
            <script>
                alert('Berhasil Mengubah Buku!');
                location='index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Kesalahan Jaringan!');
                location='index.php';
            </script>
        ";
    }
}

?>
<?php
require_once '../layout/_top.php';
?>


<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Buku <span class="fw-bold"><?= $book["judul_buku"]; ?></span></h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form method="post">
                <tr>
                  <td>Judul Buku</td>
                  <td><input class="form-control" type="text" name="judul_buku" id="judul_buku" required value="<?= $book["judul_buku"]; ?>"></td>
                </tr>
                <tr>
                  <td>Penulis Buku</td>
                  <td><input class="form-control" type="text" name="pembuat_buku" id="pembuat_buku" required value="<?= $book["pembuat_buku"]; ?>"></td>
                </tr>
                <tr>
                  <td>Kategori Buku</td>
                  <td>
                    <select class="form-control"name="kategori_buku" id="kategori_buku" required>
                    <option hidden><?= $book["kategori_buku"]; ?></option>
                                <option value="Novel">Novel</option>
                                <option value="Edukasi">Edukasi</option>
                                <option value="Drama">Drama</option>
                                <option value="School">School</option>
                                <option value="Tabloid">Tabloid</option>
                                <option value="Religion">Religion</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Deskripsi Buku</td>
                  <td><textarea name="deskripsi_buku" id="deskripsi_buku" class="form-control" cols="30" rows="8"><?= $book["deskripsi_buku"]; ?></textarea></td>
                </tr>
                <tr>
                  <td>
                  <input class="btn btn-primary" type="submit" name="editBook" value="Simpan">
                    <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                  <td>
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
