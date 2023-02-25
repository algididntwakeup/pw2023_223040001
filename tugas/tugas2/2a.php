<?php
// variabel nama depan dan nama belakang
$nama_depan = "Muhammad";
$nama_belakang = " Al Ghifari";


// menampilkan deretan angka dari 1 sampai 100 kebawah
for ($i = 1; $i <= 100; $i++) {
    // kalo abis dibagi 3 dan 5
    if ($i % 3 == 0 && $i % 5 == 0) {
        echo $nama_depan . $nama_belakang . "<br>";
    }
    // kalaw habis dibagi 3
    elseif ($i % 3 == 0) {
        echo $nama_depan . "<br>";
    }
    // klaw habis dibagi 5
    elseif ($i % 5 == 0) {
        echo $nama_belakang . "<br>";
    }
    // kl nda habis dibagi 3 dan 5
    else {
        echo $i . "<br>";
    }
}
?>
