<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}
require 'sistem/functions.php';

$allPesan = count(query("SELECT * FROM pesan"));
$allBerita = count(query("SELECT * FROM informasi"));
$allMK = count(query("SELECT * FROM mk"));
$allGallery = count(query("SELECT * FROM gallery"));
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RA3 Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- link icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'inc/headerAdmin.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include 'inc/navcontent.php' ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

                    <div class="row d-flex justify-content-around">
                        <div class="card mb-3" style="width: 16rem;">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-newspaper"></i> Berita</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $allBerita; ?></h6>
                                <a href="news.php" class="card-link">Read</a>
                            </div>
                        </div>

                        <div class="card mb-3" style="width: 16rem;">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-chat-dots"></i> Pesan</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $allPesan; ?></h6>
                                <a href="pesan.php" class="card-link">Read</a>
                            </div>
                        </div>

                        <div class="card mb-3" style="width: 16rem;">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-book"></i> MK</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $allMK; ?></h6>
                                <a href="mk.php" class="card-link">Read</a>
                            </div>
                        </div>

                        <div class="card mb-3" style="width: 16rem;">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-images"></i> Gallery</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $allGallery; ?></h6>
                                <a href="gallery.php" class="card-link">Read</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'inc/footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include 'inc/logoutModal.php'; ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>