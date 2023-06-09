<?php
require('functions.php');
$name = 'Home';


// cari siswa berdasarkan kiwot, ketika tombol diklik
if (isset($_GET['search'])) {
    $keyword = $_GET['keyword'];

    $query = "SELECT * FROM mahasiswa
                WHERE 
                nama LIKE '%keyword%'";
    $students = query($query, ['keyword']);
} else {    
    // Siapkan data $students
    $students = query("SELECT * FROM mahasiswa");
}




// dd(BASE_URL === $_SERVER["REQUEST_URI"]);
require('views/index.view.php');
