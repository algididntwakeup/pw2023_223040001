<?php 

//array ni bos, senggol dong.

//membuat arraynya.

$roti = array('Roti Bakar', 'Roti Isi','Roti Maryam', 'Roti Kukus');
// diatas adalah cara yang lama dan dibawah adalah cara yang baru dalam pemanggilan array
$biskuit = ['Soft Cookies','Wafer','Crackers','Butter Cookies'];

// apakah array bisa dengan tipe tipe yg berbeda ?
$kue =['Risoles',24,true];
// kalo emoji bisa ga tuch di array? manggilnya pake "logo window + ." yaa
$fastfood=['🍕','🌭','🍟','🌭','🥓'];


//mencetak arraynya gimana tu bg?

echo $roti[1];// buat mencetak salah satunya
echo "<hr>";
var_dump($roti);
echo "<hr>";

print_r($kue);

//manipulasi array

//menggunakan index
$roti[] = 'Roti Jala';


print_r($roti);

echo "<hr>";

//menambah elemen di akhir menggunakan array_push()

array_push($biskuit, 'Biskuit Yaya','Biskuit Keras','Biskuat');
print_r($biskuit);
echo "<hr>";

//menambah elemen di awla menggunakan array_unshift()

array_unshift($fastfood,'🍗');
print_r($fastfood);
echo "<hr>";

//menghapus elemen array di akhir, menggunakan array_pop()

array_pop($biskuit);
print_r($biskuit);
echo "<hr>";

//menghapus elemen array di awal menggunakan array_shift()

array_shift($biskuit);
print_r($biskuit);
?>