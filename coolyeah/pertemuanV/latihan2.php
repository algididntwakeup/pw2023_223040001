<?php
$rotiy = ['🥖','🍞','🫓','🥐'];
$kwe = ['🥨','🥯','🥞','🧇'];
$mamamam = ['🌮','🥙','🍠','🥗'];
?>


<html>
<head>
<title> Urutan Roti</title>
</head>

<body>

<h2>Daftar Roti</h2>
<ul>
    <?php for($i = 0; $i < count($rotiy); $i++){ ?>
    <li><?= $rotiy[$i];?></li>
    <?php } ?>
</ul>
<hr>
<h2>Daftar Kue</h2>
<ul>
    <?php for($i = 0; $i < count($kwe); $i++){ ?>
    <li><?= $kwe[$i];?></li>
    <?php } ?>
</ul>
<hr>
<h2>Daftar Mam</h2>
<ol>
    <!-- menggunakan foreach -->
    <?php foreach($mamamam as $mam){ ?>
    <li><?= $mam; ?></li>
    <?php } ?>
</ol>
<hr>
<h2>Daftar Roti tp pake foreach</h2>
<ol>
    <!-- menggunakan foreach -->
    <?php foreach($rotiy as $r){ ?>
    <li><?= $r; ?></li>
    <?php } ?>
</ol>


</body>
</html>