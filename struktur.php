<?php
require 'admin/sistem/functions.php';

$allStruktur = query("SELECT * FROM struktur");

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RA3 | Struktur</title>
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
      <p>Struktur RA3</p>
    </div>
  </div>
  <div class="container">
    <div class="d-flex justify-content-center">
      <img src="img/ico.jpg" width="300" height="300" class="rounded-circle" alt="">
    </div>
    <div class="row d-flex justify-content-around mt-4 ">
      <?php foreach ($allStruktur as $str) : ?>
        <div class="card mb-3" style="width: 18rem;">
          <img src="img/<?= $str['img']; ?>" height="250" class="card-img-top" alt="...">
          <div class="card-body text-dark">
            <h5 class="card-title"><?= $str['pangkat']; ?></h5>
            <p class="card-text"><?= $str['nama']; ?></p>
            <a href="http://wa.me/<?= $str['nomor']; ?>" class="btn btn-primary">Hubungi</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
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