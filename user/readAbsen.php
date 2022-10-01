<?php
session_start();
if (!$_SESSION['user']) {
    header("Location: ../login.php");
    exit;
}

$id = $_SESSION['user'];

require '../admin/sistem/functions.php';

$code = $_GET['code'];

$allmhs = query("SELECT * FROM absensi_mk WHERE code = '$code'");

$cek = query("SELECT * FROM absensi WHERE code = '$code'")[0];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Absen</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="shortcut icon" href="../img/ico.jpg" type="images/x-icon">
</head>

<body>
    <nav class="navbar shadow" style="background-color: #F08529;">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-white">List Absen</span>
            <span class="navbar-brand mb-0 h1 text-white">
                <a href="index.php" class="btn btn-danger btn-sm">Kembali</a>
            </span>
        </div>
    </nav>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Daftar Yang Sudah Absen</h1>
        <h3 style="font-size: 16px;"><?= $cek['mk']; ?> - <?= $cek['tanggal']; ?></h3>
        <h3 style="font-size: 16px;">Kode Akses : <?= $cek['code']; ?></h3>
        <a href="cetakAbsensi.php?code=<?= $cek['code']; ?>" class="btn btn-sm btn-success">Cetak Absen</a>
        <hr>

        <!-- blank -->
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Kehadiran</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($allmhs as $mhs) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $mhs["nama"]; ?></td>
                        <td><?= $mhs['nim']; ?></td>
                        <td><?= $mhs['kehadiran']; ?></td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- end blank -->
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>