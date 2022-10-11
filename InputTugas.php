<?php 
require 'admin/sistem/functions.php';

$succes = "";
$error = "";

$id = $_GET["id"];

if(!$id){
    header("Location: error.php");
}

$result = query("SELECT * FROM tugas_mk WHERE id = $id")[0];

if(!$result){
    header("Location: error.php");
}


if(isset($_POST["upload"])){
    if(inputTugas($_POST) > 0 ){
        $succes = true;
    }else{
        $error = true;
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RA3 | Upload Tugas - <?= $result["judul"]?></title>
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
            <p>Upload  Tugas - <?= $result["judul"]?></p>
        </div>
    </div>
    <div class="container">
        <form action="" method="post" class="p-3 shadow" enctype="multipart/form-data">
            <?php if ($succes) : ?>
                <div class="mb-3">
                    <div class="alert alert-success" role="alert">
                        Tugas Berhasil dikirim !
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($error) : ?>
                <div class="mb-3" id="gagal">
                    <div class="alert alert-danger" role="alert">
                        Tugas Gagal dikirim pastikan Kode absensi Benar!
                    </div>
                </div>
            <?php endif; ?>
            <input type="hidden" name="mk" value="<?= $result['mk']; ?>">
            <input type="hidden" name="tanggal" value="<?= $result['date']; ?>">
            <input type="hidden" name="id" value="<?= $result['id']; ?>">
            <input type="hidden" name="judul" value="<?= $result['judul']; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input required type="text" id="nama" class="form-control" name="nama">
            </div>
            <div class="mb-3">
                <label for="NIM" class="form-label">NIM</label>
                <input required type="number" id="NIM" class="form-control" name="nim">
            </div>
            <div class="mb-3">
                <label class="form-label">File Tugas</label>
                <input type="file" name="file" class="form-control">
                <p class="form-label fs-6 text-danger">file valid pdf!</p>
            </div>
            <div class="mb-3">
                <label for="Kelas" class="form-label">Kelas</label>
                <select class="form-select" required aria-label="Default select example" id="Kelas" name="kelas">
                    <option value="RA3">RA3</option>
                    <option value="RA4">RA4</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Akses</label>
                <input required type="text" id="kode" class="form-control" name="code">
                <p class="text-success fs-6">Untuk kode akses japri km Mata kuliah!</p>
            </div>
            <div class="mb-3">
                <button class="btn bg-orange text-white form-control" type="submit" name="upload">Kirim</button>
            </div>
        </form>
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