<?php

function urutanAngka($angka){
  $mulai = 1; //kasih variabel dulu buat ngitung angkanya kebawah gasi
  for($i=1;$i<=$angka;$i++){
    for($j=1;$j<=$i;$j++){
      echo $mulai." ";
      $mulai++; //nambahin variabel $mulai setiap kali angka ditampilkan
    }
    echo "<br>";
  }
}

urutanAngka(5); //functionnya kita panggil pake parameter 5 biar ngurutnya 5 baris, jd urutan angka tuh buat nentuin baris yang akan dioutput

?>
