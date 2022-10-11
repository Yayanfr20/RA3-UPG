<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit;
}
require '../admin/sistem/functions.php';
$code = $_GET['code'];
$mk = query("SELECT * FROM absensi WHERE code = '$code' ")[0];
$allmhs = query("SELECT * FROM absensi_mk WHERE code = '$code' ");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RA3 Absen - <?= $mk['mk']; ?> - <?= $mk['tanggal']; ?></title>

    <!-- Custom fonts for this template-->
    <link href="../admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../admin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- link icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body id="page-top">

    <div class="container">
        <!-- blank -->
        <h4 class="text-center mb-2 mt-2">Absensi <?= $mk['mk']; ?> - <?= $mk['tanggal']; ?></h4>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Kelas</th>
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
                        <td><?= $mhs["kelas"]; ?></td>
                        <td><?= $mhs['kehadiran']; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- end blank -->
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../admin/vendor/jquery/jquery.min.js"></script>
    <script src="../admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../admin/js/sb-admin-2.min.js"></script>
    <script>
        window.print();
    </script>
</body>

</html>