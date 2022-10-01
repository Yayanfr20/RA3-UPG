<?php
require 'admin/sistem/functions.php';

$id = $_GET['id'];
if (!$id) {
    header("Location: index.php");
    exit;
}


$result = query("SELECT * FROM informasi WHERE id = $id")[0];
if (!$result) {
    header("Location : index.php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RA3 | <?= $result['judul']; ?></title>
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

        <div class="mk mt-3 p-2" style="height: auto;">
            <p><?= $result["judul"]; ?></p>
        </div>
    </div>
    <div style="width: 100%;height: 200px;" class="d-flex justify-content-center">
        <img src="img/<?= $result['img']; ?>" height="100%" width="80%" alt="">
    </div>
    <div class="p-3">
        <div class="d-flex justify-content-around p-2">
            <p style="font-size: 14px; font-weight: bold;"><?= $result['author']; ?></p>
            <p style="font-size: 14px;"><?= $result['tanggal']; ?></p>
        </div>
        <hr>
        <div style="text-align: left;">
            <?= $result['text']; ?>
        </div>
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