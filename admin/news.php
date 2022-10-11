<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

$succes = "";
$error = "";

require 'sistem/functions.php';

if (isset($_POST["posting"])) {
    if (PostInformasi($_POST) > 0) {
        $succes = true;
    } else {
        $error = true;
    }
}


$allPost = query("SELECT * FROM informasi");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RA3 Admin - Berita</title>

    <!-- link bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

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
                    <h1 class="h3 mb-4 text-gray-800">Berita</h1>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Posting
                    </button>

                    <!-- pesan -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($allPost as $Post) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $Post["judul"]; ?></td>
                                    <td>
                                        <a href="" class="btn btn-sm mb-1 btn-danger"><i class="bi bi-trash"></i></a>
                                        <a href="" class="btn btn-sm mb-1 btn-info"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- end pesan -->
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
    <!-- link js bootstrap -->
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- modal posting -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Post Informasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="Judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" name="Judul" id="Judul">
                        </div>
                        <div class="mb-3">
                            <label for="Tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="Tanggal" id="Tanggal">
                        </div>
                        <div class="mb-3">
                            <label for="Author" class="form-label">Author</label>
                            <input type="text" class="form-control" name="Author" id="Author">
                        </div>
                        <div class="mb-3">
                            <label for="Images" class="form-label">Images</label>
                            <input type="file" class="form-control" name="gambar" id="Images">
                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="Text"></textarea>
                                <label for="floatingTextarea2">Text Informasi</label>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="posting" class="btn btn-primary">Posting</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>