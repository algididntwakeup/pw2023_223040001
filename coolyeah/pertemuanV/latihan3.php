<?php

$member =[['Adang Kusnadi','🐹','🥙'],['Iyus Pandawa','🐔','🍠']];
?>

<html>
    <head>
        <title>Data Member</title>
    </head>
    <body>
        <h2>Daftar Member Qnet</h2>
        <?php foreach ($member as $m) { ?>
        <ul>
            <li>Nama: <?= $m[0];?></li>
            <li>Shio : <?= $m[1];?></li>
            <li>Makanan Favorit : <?= $m[2];?></li>
        </ul>
        <?php } ?>
    </body>
</html>