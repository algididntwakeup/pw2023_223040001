<?php
require('../app.php');
session_start();

$bookId = $_GET["id"];

if (returningBook($bookId) > 0) {
    echo "
        <script>
            alert('Buku Telah Dikembalikan!');
            location='history-order.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Server sedang Error, Coba Lagi Nanti!');
            location='history-order.php';
        </script>
    ";
}
