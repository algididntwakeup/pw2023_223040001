<?php
echo "<h4>Menghitung Luas Lingkaran</h4>";
function hitungLuasLingkaran($r) {
    // rumus ngitung lingkaran bisa 22/7 bisa 3.14, ngitung luasnya rumusnya pi x r x r
    $luas = 3.14 * $r * $r;
    return $luas . " cm<sup>2</sup>";
    // tambahin</sup> gais biar angkanya jadi naik keatas kecil gitu teh
}

echo "Jari-jari = 10 cm. </br>";

echo "Luas Lingkaran = " . hitungLuasLingkaran(10) . "<hr>";

echo "<h4>Menghitung Keliling Lingkaran</h4>";
function hitungKelilingLingkaran($r) {
    // ngitung keliling 2 x pi x r tak lupa ditambah string cm di return agar mempunyai output dengan cm di akhirannya
    $keliling = 2 * 3.14 * $r;
    return $keliling . " cm";
}
echo "Jari-jari = 20cm. </br> </br>";
echo "Keliling lingkaran = " . hitungKelilingLingkaran(20) . "<hr>";
?>
