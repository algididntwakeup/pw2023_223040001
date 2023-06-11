<?php
session_start();

$book_id = $_GET["id"];

if (isset($_SESSION["keranjang"][$book_id])) {
    $_SESSION["keranjang"][$book_id] += 1;
} else {
    $_SESSION["keranjang"][$book_id] = 1;
}

echo "<script>alert('Berhasil menambahkan buku ke list!');location='cart.php';</script>";
