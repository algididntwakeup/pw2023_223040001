<?php
require('app.php');
if (isset($_POST["daftar"])) {
    // ini ketika tombol diklik
    if (createUser($_POST) > 0) {
        // ketika function usernya ini mengembalikan true, atau mysqli_num_rows nya lebih dari 0
        echo "<script> 
            alert('Berhasil membuat akun!'); 
            location='login.php';
        </script>";
    } else {
        echo "<script> 
            alert('Gagal membuat akun!'); 
            location='daftar.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; Unpas Library System</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="assets/img/logo/ULMS.png" alt="Unpas logo" width="150">
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h4>Register Here<span onclick="btnAdmin()">!</span></h4>
              </div>

              <div class="card-body">
              <?php isset($_COOKIE["error_auth"]) ? $error_auth = $_COOKIE["error_auth"] : $error_auth = null ?>
                <?php if ($error_auth) : ?>
                    <div class="alert alert-danger" role="alert">
                        <span><?= $error_auth; ?></span>
                    </div>
                <?php endif; ?>
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
                      Daftar
                    </button>
                  </div>
                  <a href="login.php" class="text-decoration-none float-end">
                        <p>Punya Akun? Login</p>
                    </a>
                </form>

              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Muhammad Al Ghifari 2023
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>

</html>