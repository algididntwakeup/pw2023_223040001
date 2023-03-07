<?php
// membuat array perangkat keras komputer
$perangkat_keras = array("motherboard", "processor", "hard disk", "pc cooler", "vga card", "ssd");

// menampilkan array menggunakan looping pada HTML
echo "<ul>";
foreach ($perangkat_keras as $perangkat) {
  echo "<li>" . $perangkat . "</li>";
}
echo "</ul>";

// menambahkan elemen baru pada array menggunakan fungsi array
$perangkat_keras = array_merge($perangkat_keras, array("card reader", "modem"));

// mengurutkan array secara menurun (A-Z)
rsort($perangkat_keras);

// menampilkan array yang sudah diurutkan menggunakan looping pada HTML
echo "<ul>";
foreach ($perangkat_keras as $perangkat) {
  echo "<li>" . $perangkat . "</li>";
}
echo "</ul>";
?>
