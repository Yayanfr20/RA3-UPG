<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

$success = "";
$error = "";

require 'sistem/functions.php';

if (isset($_POST["Create"])) {
    if (CreateAbsensi($_POST) > 0) {
        $success = true;
    } else {
        $error = true;
    }
}


$allAbsen = query("SELECT * FROM absensi");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RA3 Admin - Absensi</title>

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
                    <?php if ($success) : ?>
                        <div class="mb-3">
                            <div class="alert alert-success" role="alert">
                                Create Absensi Success!
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Absensi</h1>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Create
                    </button>

                    <!-- data -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">MK</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($allAbsen as $absen) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td style="font-size: 14px;"><?= $absen["mk"]; ?> - <?= $absen['tanggal']; ?></td>
                                    <td>
                                        <a href="delAbsenMK.php?id=<?= $absen['id']; ?>" onclick="return confirm('Yakin sudah dicetak ?');" class="btn btn-sm mb-1 btn-danger"><i class="bi bi-trash"></i></a>
                                        <a href="listAbsenMHS.php?id=<?= $absen['id']; ?>" class="btn btn-sm mb-1 btn-info"><i class="bi bi-eye"></i></a>
                                        <a href="https://api.whatsapp.com/send?text=*Absensi*%0A<?= $absen['mk']; ?>-<?= $absen['tanggal']; ?>%0A%0A*Kode%20Absen*%0A<?= $absen['code']; ?>%0A%0A*Link*%0Ahttp://ra3upg.rf.gd/absenRA3.php?id=<?= $absen['id']; ?>" class="btn btn-sm btn-success"><i class="bi bi-whatsapp"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- end data -->
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
                    <h5 class="modal-title" id="exampleModalLabel">Create Absensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="mk" class="form-label">Mata Kuliah</label>
                            <input required type="text" class="form-control" name="mk" id="mk">
                        </div>
                        <div class="mb-3">
                            <label for="Tanggal" class="form-label">Tanggal</label>
                            <input required type="date" class="form-control" name="date" id="Tanggal">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="Create" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>