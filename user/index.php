<?php
session_start();
if (!$_SESSION['user']) {
    header("Location: ../login.php");
    exit;
}

$id = $_SESSION['user'];

require '../admin/sistem/functions.php';

$user = query("SELECT * FROM user WHERE id = $id")[0];
$success = "";
$error = "";
$author = $user["username"];
$mk = $user['mk'];
$jmlLink = count(query("SELECT * FROM absensi WHERE mk = '$mk'"));
$linkMK = query("SELECT * FROM absensi WHERE mk = '$mk'");
$jmlPost = count(query("SELECT * FROM informasi WHERE author = '$author'"));
$jmlList = count(query("SELECT * FROM list"));

// create link absen
if (isset($_POST["Buat"])) {
    if (CreateAbsensi($_POST) > 0) {
        echo "
        <script>
        alert('Link Berhasil Dibuat!');
        document.location.href = 'readLink.php';
        </script>
        ";
    } else {
        $error = true;
    }
}


// posting informasi
if (isset($_POST["Post"])) {
    if (PostInformasi($_POST) > 0) {
        $success = true;
    } else {
        $error = true;
    }
}

// create list
if (isset($_POST["BuatList"])) {
    if (CreateList($_POST) > 0) {
        $success = true;
    } else {
        $error = true;
    }
}


date_default_timezone_set("Asia/Jakarta");
$waktu = date("F j, Y, g:i a");
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
    <!-- As a heading -->
    <?php if ($success) : ?>
        <div class="alert alert-success" role="alert">
            Success! <a href="" class="btn btn-sm btn-light">Refresh</a>
        </div>
    <?php endif; ?>
    <?php if ($error) : ?>
        <div class="alert alert-danger" role="alert">
            Not Success!
        </div>
    <?php endif; ?>
    <div style="height: 200px;background-color: black;" class="d-flex justify-content-center">
        <img src="../img/ico.jpg" height="100%" width="200" class="rounded-circle" alt="">
    </div>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #F08529;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Hai <strong><?= $user['username']; ?></strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Opsi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Buat Link Absensi</a></li>
                            <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2">Post Informasi</a></li>
                            <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal4">Buat Link Tugas</a></li>
                            <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal3">Buat List</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php">Keluar</a></li>
                        </ul>
                    </li>
                </ul>
                <h5 class="text-white"><?= $user['mk']; ?></h5>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- absensi -->
    <div class="container mt-5">
        <div class="row d-flex justify-content-around">
            <div class="card mb-3" style="width: 16rem;">
                <div class="card-body text-center">
                    <h5 class="card-title">Link Absensi</h5>
                    <h4 class="card-title"><?= $jmlLink; ?></h4>
                    <a href="readLink.php" class="btn btn-primary">Buka</a>
                </div>
            </div>

            <div class="card mb-3" style="width: 16rem;">
                <div class="card-body text-center">
                    <h5 class="card-title">Informasi</h5>
                    <h4 class="card-title"><?= $jmlPost; ?></h4>
                    <a href="readInfo.php" class="btn btn-primary">Buka</a>
                </div>
            </div>

            <div class="card mb-3" style="width: 16rem;">
                <div class="card-body text-center">
                    <h5 class="card-title">Tugas</h5>
                    <h4 class="card-title">0</h4>
                    <a href="#" class="btn btn-primary">Buka</a>
                </div>
            </div>

            <div class="card mb-3" style="width: 16rem;">
                <div class="card-body text-center">
                    <h5 class="card-title">List</h5>
                    <h4 class="card-title"><?= $jmlList; ?></h4>
                    <a href="AllList.php" class="btn btn-primary">Buka</a>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Link Absen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="mk" value="<?= $user['mk']; ?>">
                        <div class="mb-3">
                            <label for="mk" class="form-label">Absensi - <?= $user['mk']; ?></label>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal - <?= $waktu; ?></label>
                            <input type="hidden" id="tanggal" name="date" value="<?= $waktu; ?>" class="form-control">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="Buat" class="btn btn-primary">Buat</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Posting Informasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="Author" value="<?= $user['username']; ?>">
                        <input type="hidden" name="Tanggal" value="<?= $waktu; ?>">
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" name="Judul">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Images</label>
                            <input type="file" class="form-control" name="gambar">
                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control ckeditor" id="floatingTextarea2" style="height: 100px" name="Text"></textarea>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="Post" class="btn btn-primary">Buat</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal List -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="tanggal" value="<?= $waktu; ?>">
                        <div class="mb-3">
                            <label class="form-label">Judul List</label>
                            <input type="text" class="form-control" name="judul" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="BuatList" class="btn btn-primary">Buat</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Tugas -->
    <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Link Tugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center text-secondary">Nanti Yah Belom Beres Bang Yanz nya capek Lagi Tidur!</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Buat</button>
                </div>
            </div>
        </div>
    </div>
    <footer class="fixed-bottom" style="background-color: #F08529; width: 100%; height: 40px; display: flex; justify-content: center; align-items: center;">
        <marquee class="text-white">Selamat datang <strong><?= $user['username']; ?></strong> di website Ketua MK <?= $user['mk']; ?> Anda terpilih menjadi KM Mata Kuliah <?= $user['mk']; ?></marquee>
    </footer>
    <script src="../admin/ckeditor/ckeditor.js"></script>
</body>

</html>