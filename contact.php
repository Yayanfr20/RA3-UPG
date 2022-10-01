<?php
require 'admin/sistem/functions.php';
$succes = "";
$err = "";
// kirim pesan
if (isset($_POST["kirim"])) {
  if (kirimPesan($_POST) > 0) {
    $succes = true;
  } else {
    $err = true;
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RA3 | Kontak</title>
  <!-- link css Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- link icon bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <!-- link css -->
  <link rel="stylesheet" href="css/index.css">

  <!-- link favicon -->
  <link rel="shortcut icon" href="img/ico.jpg" type="images/x-icon">
</head>

<body class="con">
  <!-- header -->
  <div>
    <!-- Start Header -->
    <?php include 'admin/inc/header.php'; ?>
    <!-- End Header -->
  </div>

  <!-- content -->
  <div>
    <div class="d-flex justify-content-center">
      <div class="mk">
        <p>Hubungi Kami Di Form Contact</p>
      </div>
    </div>

    <div class="container p-3 bg-blue shadow mb-5" style="border-radius: 10px;">
      <form action="" method="post">
        <?php if ($succes) : ?>
          <div class="mb-3">
            <div class="alert alert-success" role="alert">
              Pesan Berhasil dikirim Tunggu Balasan Dari email RA3 official!
            </div>
          </div>
        <?php endif; ?>
        <?php if ($err) : ?>
          <div class="mb-3">
            <div class="alert alert-success" role="alert">
              Pesan Gagal dikirim Periksa kembali koneksi anda!
            </div>
          </div>
        <?php endif; ?>
        <div class="mb-3">
          <label for="name" class="form-label text-white">Nama</label>
          <input type="text" id="name" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label text-white">Email</label>
          <input type="email" name="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label text-white">Pesan</label>
          <textarea class="form-control" name="pesan" id="exampleFormControlTextarea1" rows="3" required></textarea>
        </div>
        <div class="mb-3">
          <button class="btn bg-orange form-control text-white" type="submit" name="kirim">Kirim</button>
        </div>
      </form>
    </div>
  </div>

  <!-- footer -->
  <div>
    <!-- Start Footer -->
    <footer>
      <p>Create By <a href="http://yanz.epizy.com">Yanz</a></p>
    </footer>
  </div>



  <!-- End Footer -->

  <!-- link javascript bootstrap -->
  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>