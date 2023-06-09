<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$users = mysqli_query($connection, "SELECT COUNT(*) FROM users");
$buku = mysqli_query($connection, "SELECT COUNT(*) FROM buku");
$pinjam = mysqli_query($connection, "SELECT COUNT(*) FROM pinjam");


$total_users = mysqli_fetch_array($users)[0];
$total_buku = mysqli_fetch_array($buku)[0];
$total_pinjam = mysqli_fetch_array($pinjam)[0];
?>

<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="column">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Jumlah Anggota</h4>
            </div>
            <div class="card-body">
              <?= $total_users ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-book"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Jumlah Buku</h4>
            </div>
            <div class="card-body">
              <?= $total_buku ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Transaksi</h4>
            </div>
            <div class="card-body">
              <?= $total_pinjam ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>  