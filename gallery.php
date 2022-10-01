<?php
require 'admin/sistem/functions.php';

$allGallery = query("SELECT * FROM gallery ORDER BY id DESC");
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RA3 | Gallery</title>
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
      <p>Gallery RA3</p>
    </div>
  </div>
  <div class="container">
    <div class="row d-flex justify-content-around">
      <?php foreach ($allGallery as $gallery) : ?>
        <div class="card p-2 mb-3" style="width: 18rem;">
          <img src="img/<?= $gallery['img']; ?>" height=" 200" class="card-img-top" alt="...">
          <div class="card-body">
            <a href="admin/download.php?path=../img/<?= $gallery["img"]; ?>" class="btn btn-primary">unduh</a>
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