<?php
require 'admin/sistem/functions.php';

$allAbsensi = query("SELECT * FROM absensi");
$jmlAbsensi = count(query("SELECT * FROM absensi"));
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RA3 | Absen</title>
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
            <p>Absensi MK RA3</p>
        </div>
    </div>
    <div class="container">
        <?php if ($jmlAbsensi == 0) : ?>
            <div class="d-flex justify-content-center">
                <h1>Tidak Ada Link Absensi</h1>
            </div>
        <?php endif; ?>
        <?php if ($jmlAbsensi >= 1) : ?>
            <div class="bg-blue p-4 mt-3 profil text-center">
                <ul class="list-group">
                    <?php foreach ($allAbsensi as $Absensi) : ?>
                        <li class="list-group-item text-center mb-3">
                            <h4><?= $Absensi["mk"]; ?></h4>
                            <p><?= $Absensi["tanggal"]; ?></p>
                            <a href="absenRA3.php?id=<?= $Absensi['id']; ?>" class="btn btn-primary">Absen</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
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