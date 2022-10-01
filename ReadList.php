<?php
require 'admin/sistem/functions.php';
$id = $_GET['id'];
if (!$id) {
    header("Location: error.php");
    exit;
}

$cek = query("SELECT * FROM list WHERE id = $id")[0];

if (!$cek) {
    header("Location: error.php");
    exit;
}

$succes = "";
$error = "";
if (isset($_POST["absen"])) {
    if (ListMHS($_POST) > 0) {
        $succes = true;
    } else {
        $error = true;
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RA3 | List - <?= $cek['judul_list']; ?></title>
    <!-- link css Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- link icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- link css -->
    <link rel="stylesheet" href="css/index.css">

    <!-- link favicon -->
    <link rel="shortcut icon" href="img/ico.jpg" type="images/x-icon">
</head>

<body>

    <!-- Start Header -->
    <?php include 'admin/inc/header.php'; ?>
    <!-- End Header -->

    <!-- start profile -->
    <div class="d-flex justify-content-center">

        <div class="mk">
            <p>Add List <?= $cek['judul_list']; ?> - <?= $cek['tanggal']; ?></p>
        </div>
    </div>
    <div class="container">
        <form action="" method="post" class="p-3 shadow">
            <?php if ($succes) : ?>
                <div class="mb-3">
                    <div class="alert alert-success" role="alert">
                        Berhasil dikirim <span class="text-danger">Dimohon Untuk Tidak mengirim ulang!</span>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($error) : ?>
                <div class="mb-3" id="gagal">
                    <div class="alert alert-danger" role="alert">
                        Gagal dikirim pastikan Kode List Benar!
                    </div>
                </div>
            <?php endif; ?>
            <input type="hidden" name="tanggal" value="<?= $cek['tanggal']; ?>">
            <input type="hidden" name="id" value="<?= $cek['id']; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input required type="text" id="nama" class="form-control" name="nama">
            </div>
            <div class="mb-3">
                <label for="NIM" class="form-label">NIM</label>
                <input required type="number" id="NIM" class="form-control" name="nim">
            </div>
            <div class="mb-3">
                <label for="kode" class="form-label">Kode List</label>
                <input required type="text" id="kode" class="form-control" name="code">
            </div>
            <div class="mb-3">
                <button class="btn bg-orange text-white form-control" type="submit" name="absen">Kirim</button>
            </div>
        </form>
    </div>
    <!-- end profil -->

    <!-- Start About -->
    <div class="about">
        <img src="img/ico.jpg" class="logo" alt="">
        <div>
            <ul>
                <li>
                    <p><i class="bi bi-geo-alt-fill"></i> Jl. Raya Trip Jamak Sari, Sumurpecung, Kec. Serang, Kota Serang, Banten 42111</p>
                </li>
                <li>
                    <p><i class="bi bi-whatsapp"></i> +62 838 7361 4764</p>
                </li>
                <li>
                    <p><i class="bi bi-house"></i> RA3 Universitas Primagraha</p>
                </li>
            </ul>
        </div>
    </div>
    <!-- End About -->

    <!-- Start Footer -->
    <footer>
        <p>Create By <a href="http://yanz.epizy.com">Yanz</a></p>
    </footer>
    <!-- End Footer -->

    <!-- link javascript bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>