<?php 
$x = 5;
$y = 4;
function cek_ganjil_genap($angka) {
  if ($angka % 2 == 0) {
    return $angka . " adalah bilangan genap.";
  } else {
    return $angka . " adalah bilangan ganjil.";
  }
}

// Contoh pemanggilan function
echo cek_ganjil_genap($x); // Output: $angka adalah bilangan ganjil.
echo "<br/>";
echo cek_ganjil_genap($y); // Output: $angka adalah bilangan genap.

?>