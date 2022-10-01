<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit;
}
require '../admin/sistem/functions.php';
$id = $_GET['id'];

$info = query("SELECT * FROM informasi WHERE id = $id")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RA3 Absen - <?= $info['judul']; ?> - <?= $info['tanggal']; ?></title>

    <!-- Custom fonts for this template-->
    <link href="../admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../admin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- link icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body id="page-top">

    <div class="container p-3">
        <!-- blank -->
        <h3 class="text-center"><?= $info['judul']; ?></h3>
        <div style="border-bottom: 1.5px solid black;">

        </div>
        <ul style="list-style: none;" class="mt-3 mb-3">
            <li>
                <p>Mata kuliah : <?= $info['judul']; ?></p>
            </li>
            <li>
                <p>Ketua MK : <?= $info['author']; ?></p>
            </li>
            <li>
                <p>Tanggal : <?= $info['tanggal']; ?></p>
            </li>
        </ul>
        <div class="mt-2 text-left">
            <?= $info["text"]; ?>
        </div>

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