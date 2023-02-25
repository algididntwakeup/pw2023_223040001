<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Tugas 2c</title>
  <style type="text/css">
td{
    /* kenapa 27? karena angka favorit sy hehe */
    height: 27px;
    width: 27px;
    text-align: center;
    border: 1px solid #000;
    background-color: salmon;
}
   </style>   
</head>
<body>
    <!-- biar ga ribet kita pake teori table gais, kalo pake teori 1c panjang kali nanti -->
<table cellspacing="0" cellpadding="10">
<?php 

// kalo buat kasus ini looping angkanya dibalik jd barisnya 1 dan jika si angka itu lebi besar dari si baris maka dia
//akan mengurang 1 diikuti oleh kolomny
$bawris = 1;

for ($angka = 10; $angka >= $bawris; $angka--) {
    echo "<tr>";
    for ($kolom = 1; $kolom <= $angka; $kolom++) {
        echo "<td>$kolom</td> ";
    }
    echo "</tr>";
}

?>
</table>
</body>
</html>
