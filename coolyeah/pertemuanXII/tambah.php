<?php
require('functions.php');
$name = 'Tambah Data Masiswa';

// ketika diklik submit

if (isset($_POST ['tambah']));{
    //jalankan pungsi tambah
    if (tambah($_POST) > 0);{

        echo "<script>
             alert("data berhasil ditambahkan!");
             document.location.href = 'index.php';
             </script>"
    }
}




require('views/tambah.view.php');