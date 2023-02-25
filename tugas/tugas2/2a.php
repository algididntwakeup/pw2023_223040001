<?php

// Menetapkan nama depan dan belakang ke dalam variabel
$nama_depan = "Muhammad ";
$nama_belakang = "Al Ghifari";

// Looping dari 100 ke 1
for ($i = 100; $i > 0; $i--) {

  // Jika angka habis dibagi 3 dan 5
  if ($i % 3 == 0 && $i % 5 == 0) {
    echo $nama_depan . $nama_belakang . "<br>";
  }
  // Jika angka habis dibagi 3
  elseif ($i % 3 == 0) {
    echo $nama_depan . "<br>";
  }
  // kalo angkanya abis dibagi 5
  elseif ($i % 5 == 0) {
    echo $nama_belakang . "<br>";
  }
  // kalo angkanya ga abis dibagi 3 atau 5
  else {
    echo $i . "<br>";
  }
}
?>
