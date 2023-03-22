<?php
    // Array Numeric
    // $mahasiswa = [
    //     [
    //         "Muhammad Al Ghifari",
    //         223040001,
    //         "algisosmedacc@gmail.com",
    //         "Teknik Informatika"
    //     ],
    //     [
    //         "Aurelia Melati Suci",
    //         223040045,
    //         "aureliaare@gmail.com",
    //         "Teknik Informatika"
    //     ],  
    // ];

    // Array Associative
    //  sama macam array numerik, kecuali ini key-nya tu string yang kita buat sendiri
    $mahasiswa = [
        [
            "nama"      => "Muhammad Al Ghifari",
            "nrp"       => 223040001,
            "email"     => "algisosmedacc@gmail.com",
            "jurusan"   => "Teknik Informatika",
            "gambar"    => "img/agi.png"
        ],
        [
            "nama"      => "Aurelia Melati Suci",
            "nrp"       => 223040045,
            "email"     => "aureliaare@gmail.com",
            "jurusan"   => "Teknik Informatika",
            "gambar"    => "img/orel.png"
        ],
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <?php foreach($mahasiswa as $mhs): ?>
        <ul>
            <li><img src="<?= $mhs['gambar']; ?>" alt="Gambar <?= $mhs['nama']; ?>"></li>
            <li><?= $mhs['nama']; ?></li>
            <li><?= $mhs['nrp']; ?></li>
            <li><?= $mhs['email']; ?></li>
            <li><?= $mhs['jurusan']; ?></li>
        </ul>
    <?php endforeach; ?>
</body>
</html>