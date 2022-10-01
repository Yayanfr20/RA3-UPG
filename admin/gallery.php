<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}
require 'sistem/functions.php';

$allImages = query("SELECT * FROM gallery ORDER BY id DESC");
$jmlImages = count(query("SELECT * FROM gallery"));

$success = "";

// upload
if (isset($_POST["upload"])) {
    if (uploadGallery($_POST) > 0) {
        $success = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RA3 Admin - Gallery</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- link bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
                    <?php if ($success) : ?>
                        <div class="alert alert-success" role="alert">
                            Upload berhasil!
                            <a href="gallery.php" class="btn btn-sm btn-light">refresh</a>
                        </div>
                    <?php endif; ?>
                    <h1 class="h3 mb-4 text-gray-800">Gallery</h1>
                    <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Upload Images</a>
                    <hr>
                    <!-- Gallery -->
                    <?php if ($jmlImages >= 1) : ?>
                        <div class="row d-flex justify-content-around">
                            <?php foreach ($allImages as $Images) : ?>
                                <div class="card mb-3" style="width: 18rem;">
                                    <img src="../img/<?= $Images['img']; ?>" height="160" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <a href="delImages.php?id=<?= $Images['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm mb-1 btn-danger"><i class="bi bi-trash"></i></a>
                                        <a href="../img/<?= $Images['img']; ?>" class="btn btn-sm mb-1 btn-info"><i class="bi bi-eye"></i></a>
                                        <a href="download.php?path=../img/<?= $Images["img"]; ?>" class="btn btn-sm mb-1 btn-success"><i class="bi bi-file-arrow-down"></i></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- end Gallery -->
                    <?php endif; ?>
                    <?php if ($jmlImages == 0) : ?>
                        <h1 class="text-center">Tidak Ada Images</h1>
                    <?php endif; ?>
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

    <!-- modal upload -->
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">File Images</label>
                            <input type="file" class="form-control" name="gambar">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="upload" class="btn btn-primary">Upload</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal upload -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- link js bootstrap -->
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>