<?php
// membuat array perangkat keras komputer
$hatwer = ["motherboard", "processor", "hard disk", "pc cooler", "vga card", "ssd"];

?>
<html>
<head>
    <title>Tugas 4b</title>
</head>
<body>
    <h2>Macam-macam perangkat keras komputer</h2>
    <!-- menampilkan array menggunakan looping pada HTML -->
    <ol>
        <?php foreach($hatwer as $hh) { ?>
        <li><?= $hh ?></li>
        <?php } ?>
    </ol>
    <!--  menambahkan elemen baru pada array menggunakan fungsi array push -->
    <?php 
        array_push($hatwer, "card reader", "modem");
        sort($hatwer);
    ?>

    <h2>Macam-macam perangkat keras komputer baru</h2>
    <ol>
        <?php foreach($hatwer as $hh) { ?>
        <li><?= $hh ?></li>
        <?php } ?>
    </ol>
</body>
</html>