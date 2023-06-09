<?php
define('BASE_URL', '/pw2023_223040001/kuliah/pertemuanXIII/');

function koneksi()
{
  // koneksi ke DB
  $conn = mysqli_connect('localhost', 'root', '', 'pw2023_223040001') or die('KONEKSI GAGAL');
  return $conn;
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));


  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data)
{
  $conn = koneksi();

  $nim = htmlspecialchars($data['nim']);
  $nama = htmlspecialchars($data['nama']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $pap = htmlspecialchars($data['pap']);

  $query = "INSERT INTO mahasiswa VALUES (null, '$nim', '$nama', '$email', '$jurusan', '$pap')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));


  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();
  $query = "DELETE FROM mahasiswa WHERE id = $id";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();

  $id = $data['id'];
  $nim = htmlspecialchars($data['nim']);
  $nama = htmlspecialchars($data['nama']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $pap = htmlspecialchars($data['pap']);

  $query = "UPDATE mahasiswa SET
            nim = '$nim',
            nama = '$nama',
            email = '$email',
            jurusan = '$jurusan',
            pap = '$pap'
            WHERE
            id = $id";

  mysqli_query($conn, $query) or die(mysqli_error($conn));


  return mysqli_affected_rows($conn);
}

function dd($value)
{
  echo "<pre>";
  var_dump($value);
  die;
  echo "</pre>";
}

function uriIS($uri)
{
  return ($_SERVER["REQUEST_URI"] === BASE_URL) ? 'active' : '';
}
