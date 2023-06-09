<?php
require('functions.php');

$name = 'Ubah Data Mahasiswa';
$id = $_GET['id'];
$student = query("SELECT * FROM mahasiswa WHERE id= $id")[0];

// saat tombol submit diklik
if (isset($_POST["ubah"])) {
  // jalankan fungsi tambah()
  if (ubah($_POST) > 0) {
    echo "<script>
    alert('Data berhasil diubah!');
    document.location.href = 'index.php';
    </script>";
  }
}

// dd(BASE_URL === $_SERVER["REQUEST_URI"]);
require('views/ubah.view.php');
