<?php
define('BASE_URL', '/pw2023_223040001/kuliah/pertemuanXII/');

function koneksi()
{
  // koneksi ke DB
  $conn = mysqli_connect('localhost', 'root', '', 'pw2023_223040001') or die('ngawur cok');
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

function tambah($data){

  $conn = koneksi();

  $nim = $data['nim'];
  $nama = $data['nama'];
  $email = $data['email'];
  $jurusan = $data['jurusan'];
  $pap = $data['pap'];

  $query="INSERT INTO masiswa VALUES (null, '$nim', '$nama','$email','$jurusan','$pap')";
  
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