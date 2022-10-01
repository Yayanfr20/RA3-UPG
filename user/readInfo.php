<?php
session_start();
if (!$_SESSION['user']) {
    header("Location: ../login.php");
    exit;
}

$id = $_SESSION['user'];

require '../admin/sistem/functions.php';

$user = query("SELECT * FROM user WHERE id = $id")[0];
$author = $user["username"];
$allLink = query("SELECT * FROM informasi WHERE author = '$author'");
$jmlLink = count(query("SELECT * FROM informasi WHERE author = '$author'"));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RA3 - <?= $user['username']; ?></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="shortcut icon" href="../img/ico.jpg" type="images/x-icon">
</head>

<body>
    <div style="height: 200px;background-color: black;" class="d-flex justify-content-center">
        <img src="../img/ico.jpg" height="100%" width="200" class="rounded-circle" alt="">
    </div>
    <nav class="navbar shadow" style="background-color: #F08529;">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-white">Daftar Link</span>
            <span class="navbar-brand mb-0 h1 text-white d-flex">
                <a href="index.php" class="btn btn-primary btn-sm">Kembali</a>
            </span>
        </div>
    </nav>

    <!-- absensi -->
    <div class="container mt-3">
        <?php if ($jmlLink >= 1) : ?>
            <div class="row d-flex justify-content-around">
                <?php foreach ($allLink as $link) : ?>
                    <div class="card text-dark mb-3 p-1" style="width: 16rem;">
                        <div class="card-body">
                            <h6 class="card-title"><?= $link["judul"]; ?></h6>
                        </div>
                        <div class="card-footer">
                            <a href="delNews.php?id=<?= $link['id']; ?>" onclick="return confirm('Yakin Anda Sudah Cetak Terlebih DahulU?');" class="btn btn-sm btn-danger">Hapus</a>
                            <a href="https://api.whatsapp.com/send?text=http://ra3upg.rf.gd/readNews.php?id=<?= $link['id']; ?>" class="btn btn-sm btn-success">Bagikan</a>
                            <a href="cetakInfo.php?id=<?= $link['id']; ?>" class="btn btn-sm btn-info text-white">Cetak</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="d-flex justify-content-center">
                <div class="card text-dark mb-3 p-1 text-center" style="width: 16rem;">
                    <div class="card-body">
                        <h5 class="card-title">Tidak Ada Informasi</h5>
                    </div>
                    <div class="card-body">
                        <hr>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <footer class="fixed-bottom" style="background-color: #F08529; width: 100%; height: 40px; display: flex; justify-content: center; align-items: center;">
        <marquee class="text-white">Selamat datang <strong><?= $user['username']; ?></strong> di website absensi MK <?= $user['mk']; ?> Anda terpilih menjadi KM Mata Kuliah <?= $user['mk']; ?></marquee>
    </footer>
</body>

</html>