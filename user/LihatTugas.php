<?php
require '../admin/sistem/functions.php'; 
$id = $_GET["id"];
if(!$id){
    header("Location: AllTugas.php");
}
$cek = query("SELECT * FROM tugas_mk WHERE id = $id")[0];
$code = $cek["code"];
$allmhs = query("SELECT * FROM tugas WHERE code = '$code'");
$jmlTugas = count(query("SELECT * FROM tugas WHERE code = '$code'"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Tugas</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="shortcut icon" href="../img/ico.jpg" type="images/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar shadow" style="background-color: #F08529;">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-white">List Tugas</span>
            <span class="navbar-brand mb-0 h1 text-white">
                <a href="index.php" class="btn btn-danger btn-sm">Kembali</a>
            </span>
        </div>
    </nav>

    <!-- Begin Page Content -->
    <div class="container-fluid">

    <?php  if($jmlTugas >= 1): ?>
    <!-- Page Heading -->
    <h3 style="font-size: 20px;" class="mb-3 mt-3">Daftar File tugas <?= $cek["judul"];?></h3>
        <hr>

        <!-- blank -->
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>File</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($allmhs as $mhs) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $mhs["nama"]; ?></td>
                        <td>
                            <a href="../admin/download.php?path=file/<?= $mhs['file']; ?>" class="btn btn-sm btn-success"><i class="bi bi-cloud-arrow-down-fill"></i></a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- end blank -->
    <?php else: ?>
        <div class="d-flex justify-content-center mt-5">
                <div class="card text-dark mb-3 p-1 text-center" style="width: 16rem;">
                    <div class="card-body">
                        <h5 class="card-title">Belum ada yang mengirimkan tugas!</h5>
                    </div>
                    <div class="card-body">
                        <hr>
                    </div>
                </div>
            </div>
    <?php endif;?>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>