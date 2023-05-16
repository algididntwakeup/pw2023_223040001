<?php
require('functions.php');
$name = 'Home';

//db connexion
$conn = mysqli_connect('localhost','root','','pw2023_223040001') or die('Database Ngawur Cuk');

//query ke tabel masiswa
$hasil = mysqli_query($conn, "SELECT * FROM mahasiswa") or die (mysqli_error($conn)); 


$rows = [];

while($row = mysqli_fetch_assoc($hasil)){
  $rows[] = $row;
}
//siapkan data $students

$students = $rows;


// $students = [
//   [
//     "nama" => "Sandhika Galih",
//     "npm" => "043040023",
//     "email" => "sandhikagalih@unpas.ac.id"
//   ],
//   [
//     "nama" => "Doddy Ferdiansyah",
//     "npm" => "133040003",
//     "email" => "doddy@gmail.com"
//   ]
// ];

// dd(BASE_URL === $_SERVER["REQUEST_URI"]);
require('views/index.view.php');
