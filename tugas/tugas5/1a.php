<?php
    $mahasiswa = [
        [
            "nama"      => "Muhammad Al Ghifari",
            "nrp"       => 223040001,
            "email"     => "algisosmedacc@gmail.com",
            "jurusan"   => "Teknik Informatika",
            "gambar"    => "img/apa1.png"
        ],
        [
            "nama"      => "Aurelia Melati Suci",
            "nrp"       => 223040045,
            "email"     => "melatisuci@gmail.com",
            
            "jurusan"   => "Teknik Informatika",
            "gambar"    => "img/apa7.png"
        ],
        [
            "nama"      => "Farid Maulana Suherman",
            "nrp"       => 223040008,
            "email"     => "cengcengroster@gmail.com",
            "jurusan"   => "Teknik Informatika",
            "gambar"    => "img/apa2.png"
        ],
        [
            "nama"      => "Daniel Satya Ramadhan",
            "nrp"       => 223040011,
            "email"     => "daniiilll@gmail.com",
            "jurusan"   => "Teknik Informatika",
            "gambar"    => "img/apa3.png"
        ],
        [
            "nama"      => "Muhammad Alfa Rizky",
            "nrp"       => 223040004,
            "email"     => "alffrzzz@gmail.com",
            "jurusan"   => "Teknik Informatika",
            "gambar"    => "img/apa4.png"
        ],
        [
            "nama"      => "Daffa Aprillino",
            "nrp"       => 223040025,
            "email"     => "dawenggg@gmail.com",
            "jurusan"   => "Teknik Informatika",
            "gambar"    => "img/apa6.png"
        ],
        [
            "nama"      => "Gina Meirina",
            "nrp"       => 223040006,
            "email"     => "gmeirina@gmail.com",
            "jurusan"   => "Teknik Informatika",
            "gambar"    => "img/apa5.png"
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center p-2">Daftar Mahasiswa</h1>
    <section>
        
        <div class="row p-3">
        <?php foreach($mahasiswa as $mhs): ?>
            <div class="col-lg-2">
                <div class="card mb-2">
                <div class="card-body align-self-center">
                    <img src="<?= $mhs['gambar']; ?>" alt="avatar <?= $mhs['nama']; ?>"
                    class="rounded-circle img-fluid" style="width: 150px;">
                </div>
                </div>  
            </div>

            <div class="col-lg-4 mb-4">
                <div class="card">
                <div class="card-body">
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Nama</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $mhs['nama']; ?></p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">NRP</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $mhs['nrp']; ?></p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $mhs['email']; ?></p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Jurusan</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $mhs['jurusan']; ?></p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
    </section>
</body>
</html>