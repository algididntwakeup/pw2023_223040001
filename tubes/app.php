<?php

/**
 * SET UP DATABASE
 */
$db = mysqli_connect("localhost", "root", "", "dbrimexx");


function querySql($query)
{
    global $db;

    $book =  mysqli_query($db, $query);
    $books = [];
    while ($row = mysqli_fetch_assoc($book)) {
        $books[] = $row;
    }
    return $books;
}

function createUser($data)
{
    global $db;

    $nama = htmlspecialchars($data["nama"]);
    $email =  htmlspecialchars($data["email"]);
    $password =  htmlspecialchars($data["password"]);
    $jenis_kelamin =  htmlspecialchars($data["jenis_kelamin"]);
    $createdAt =  date("Y-m-d h:m:s");

    // Mendapatkan ID prodi yang dipilih oleh pengguna
    $prodi_id = $_POST['prodi'];

    // Mendapatkan foto
    $foto = $_FILES['foto']['name'];
    $tmpFoto = $_FILES['foto']['tmp_name'];
    if (!empty($foto)) {
        // Rename file foto. Contoh: foto-AG007.jpg
        $ext_file = pathinfo($foto, PATHINFO_EXTENSION);
        $foto_rename = 'foto-' . $nama . '.' . $ext_file;
        $lokasiFoto = "assets/img/members/" . $foto_rename;

        if (move_uploaded_file($tmpFoto, $lokasiFoto)) {
            $foto = $foto_rename; // untuk keperluan Query INSERT
        } else {
            $foto = '-';
        }
    } else {
        $foto = '-';
    }

    // Query untuk mendapatkan nama prodi berdasarkan ID prodi
    $queryProdi = "SELECT nama_prodi FROM prodi WHERE id_prodi = '$prodi_id'";
    $resultProdi = mysqli_query($db, $queryProdi);
    $rowProdi = mysqli_fetch_assoc($resultProdi);
    $nama_prodi = $rowProdi['nama_prodi'];

    // Validasi input yang diperlukan
    if (empty($nama) || empty($email) || empty($password) || empty($jenis_kelamin) || empty($prodi_id)) {
        setcookie("error_auth", "Harap isi semua field dengan benar dan lengkap yaa.", time() + 1);
        header("location: register.php");
        exit;
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $queryCreateUser = "INSERT INTO users (id, id_prodi, nama, email, password, jenis_kelamin, role, createdAt, foto) VALUES (NULL, '$prodi_id', '$nama', '$email', '$passwordHash', '$jenis_kelamin', 'member', '$createdAt', '$foto')";
    mysqli_query($db, $queryCreateUser);
    

    return mysqli_affected_rows($db);
}

function editUser($data)
{
    global $db;

    $id = $data['id'];
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $password = htmlspecialchars($data["password"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);

    // Mendapatkan ID prodi yang dipilih oleh pengguna
    $prodi_id = $_POST['prodi'];

    // Mendapatkan foto
    $foto = $_FILES['foto']['name'];
    $tmpFoto = $_FILES['foto']['tmp_name'];

    // Mengambil data user yang akan diupdate
    $queryUser = "SELECT * FROM users WHERE id = '$id'";
    $resultUser = mysqli_query($db, $queryUser);
    $userData = mysqli_fetch_assoc($resultUser);

    // Validasi input yang diperlukan
    if (empty($nama) || empty($email) || empty($jenis_kelamin) || empty($prodi_id)) {
        setcookie("error_form", "Harap isi semua field dengan benar dan lengkap yaa.", time() + 1);
        header("location: edit.php?id=$id");
        exit;
    }

    // Proses update data
    $queryUpdateUser = "UPDATE users SET 
                        nama = '$nama',
                        email = '$email',
                        jenis_kelamin = '$jenis_kelamin',
                        id_prodi = '$prodi_id'";

    // Update password jika ada perubahan
    if (!empty($password)) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $queryUpdateUser .= ", password = '$passwordHash'";
    }

    // Update foto jika ada perubahan
    if (!empty($foto)) {
        // Hapus foto lama jika ada
        if ($userData['foto'] != '-') {
            unlink("assets/img/members/" . $userData['foto']);
        }

        // Rename file foto. Contoh: foto-AG007.jpg
        $ext_file = pathinfo($foto, PATHINFO_EXTENSION);
        $foto_rename = 'foto-' . $nama . '.' . $ext_file;
        $lokasiFoto = "assets/img/members/" . $foto_rename;

        if (move_uploaded_file($tmpFoto, $lokasiFoto)) {
            $queryUpdateUser .= ", foto = '$foto_rename'";
        }
    }

    $queryUpdateUser .= " WHERE id = '$id'";

    mysqli_query($db, $queryUpdateUser);

    return mysqli_affected_rows($db);
}


function createBook($data)
{
    global $db;

    $judul_buku = $data["judul_buku"];
    $kategori_buku = $data["kategori_buku"];
    $pembuat_buku = $data["pembuat_buku"];
    $deskripsi_buku = $data["deskripsi_buku"];
    $rilis_buku = date("Y-m-d h:m:s");

    $queryBook = "SELECT * FROM buku WHERE judul_buku = '$judul_buku'";
    $dataBook = mysqli_query($db, $queryBook);
    if (mysqli_fetch_assoc($dataBook)) {
        setcookie("error_form", 'Buku Sudah Ada!', time() + 1);
        header("Location: create-product.php");
        return false;
    }

    if (empty($judul_buku)) {
        setcookie("error_form", 'Judul Buku wajib di isi!', time() + 1);
        header("Location: create-product.php");
    } else if (empty($kategori_buku)) {
        setcookie("error_form", 'Kategori buku juga wajib di isi!', time() + 1);
        header("Location: create-product.php");
    } else if (empty($pembuat_buku)) {
        setcookie("error_form", 'Pembuat nya juga, penting soalnya!', time() + 1);
        header("Location: create-product.php");
    } else if (empty($deskripsi_buku)) {
        setcookie("error_form", 'Deskripsi juga di isi ya!', time() + 1);
        header("Location: create-product.php");
    }


    $queryCreateBook = "INSERT INTO buku VALUES(id_buku,'$judul_buku','$kategori_buku','$pembuat_buku','$deskripsi_buku','$rilis_buku')";

    mysqli_query($db, $queryCreateBook);
    return mysqli_affected_rows($db);
}


function deleteCartBook($id)
{
    global $db;

    $queryDeleteCartBook = "DELETE FROM buku WHERE id_buku = '$id'";
    mysqli_query($db, $queryDeleteCartBook);
    return mysqli_affected_rows($db);
}

function createCheckout($data)
{
    global $db;
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $no_telp = htmlspecialchars($data["no_telp"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $durasi_pinjaman = htmlspecialchars($data["durasi_pinjaman"]);
    $nama_buku = htmlspecialchars($data["nama_buku"]);
    $tanggalPinjam = date("Y-m-d h:m:s");

    if (empty($no_telp)) {
        setcookie("error_validation_checkout", 'Nomor Handphone nya di isi ya!', time() + 1);
        header("Location: checkout.php");
        return false;
    } else if (empty($alamat)) {
        setcookie("error_validation_checkout", 'Alamat tidak boleh kosong!', time() + 1);
        header("Location: checkout.php");
        return false;
    } else if (strlen($no_telp)  >= 16) {
        setcookie("error_validation_checkout", 'Nomor telephone tidak boleh lebih dari 16!', time() + 1);
        header("Location: checkout.php");
        return false;
    }

    $sqlAlreadyMinjem = "SELECT * FROM pinjam WHERE nama = '$nama'";
    $dataMinjem =  mysqli_query($db, $sqlAlreadyMinjem);

    if (mysqli_fetch_assoc($dataMinjem)) {
        setcookie("error_validation_checkout", 'Mohon maaf Selesaikan Peminjaman sebelumnya untuk meminjam lagi!', time() + 1);
        header("Location: checkout.php");
        return false;
    }

    $sqlMinjem = "INSERT INTO pinjam VALUES(id_pinjam,'$nama','$nama_buku','$email','$no_telp','$alamat','$durasi_pinjaman','Dipinjam','$tanggalPinjam')";
    mysqli_query($db, $sqlMinjem);
    unset($_SESSION["keranjang"]);
    return mysqli_affected_rows($db);
}

function returningBook($id)
{
    global $db;
    $queryAcceptOrder = "UPDATE pinjam SET status_buku ='Dikembalikan' WHERE id_pinjam = '$id'";
    mysqli_query($db, $queryAcceptOrder);
    return mysqli_affected_rows($db);
}

function missingBook($bookid)
{
    global $db;

    $queryMissingBook = "UPDATE pinjam SET status_buku = 'Hilang' WHERE id_pinjam ='$bookid'";
    mysqli_query($db, $queryMissingBook);
    return mysqli_affected_rows($db);
}
function editBook($data, $id)
{

    global $db;

    $judul_buku = $data["judul_buku"];
    $kategori_buku = $data["kategori_buku"];
    $pembuat_buku = $data["pembuat_buku"];
    $deskripsi_buku = $data["deskripsi_buku"];
    $updateBuku = date("Y-m-d h:m:s");

    $findBook = "UPDATE buku SET judul_buku = '$judul_buku', kategori_buku = '$kategori_buku', pembuat_buku = '$pembuat_buku', deskripsi_buku = '$deskripsi_buku', rilis_buku = '$updateBuku' WHERE id_buku = '$id'";
    mysqli_query($db, $findBook);
    return mysqli_affected_rows($db);
}
function deleteBook($id)
{
    global $db;

    $queryDeleteBook = "DELETE FROM buku WHERE id_buku = '$id'";
    mysqli_query($db, $queryDeleteBook);
    return mysqli_affected_rows($db);
}
