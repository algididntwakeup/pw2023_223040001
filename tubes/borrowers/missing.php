<?php
require('../app.php');
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
}

$bookId = $_GET["id"];

if (missingBook($bookId) > 0) {
    echo "
        <script>
            alert('Orderan Berhasil Di Tolak!');
            location='index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Server sedang Error, Coba Lagi Nanti!');
            location='index.php';
        </script>
    ";
}
