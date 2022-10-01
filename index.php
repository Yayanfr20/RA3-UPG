<?php
require 'admin/sistem/functions.php';

$allmk = query("SELECT * FROM mk");

$allNews = query("SELECT * FROM informasi ORDER BY id DESC");

$jmlNews = count(query("SELECT * FROM informasi"));
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RA3 | Beranda</title>
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

  <!-- Start Carousel -->
  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="3000">
        <img src="img/hero.jpg" width="100%" height="400" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="img/hero2.jpg" width="100%" height="400" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="4000">
        <img src="img/hero3.jpg" width="100%" height="400" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- End Carousel -->

  <!-- Start TextWelcome -->
  <div class="Welcome">
    <marquee>Selamat Datang Di Official Website RA3</marquee>
  </div>
  <!-- End TextWelcome -->

  <!-- Start mk -->
  <div class="container d-flex justify-content-center">
    <div class="mk">
      <p>Grup WhatsApp Mata Kuliah</p>
    </div>
  </div>

  <div class="row d-flex justify-content-around">
    <?php foreach ($allmk as $mk) : ?>
      <div class="card mb-3 bg-blue" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?= $mk['pelajaran']; ?></h5>
          <p class="card-text">Dosen : <?= $mk['dosen']; ?></p>
          <p class="card-text">KM : <?= $mk['km']; ?></p>
          <a href="<?= $mk['wa']; ?>" class="btn bg-orange text-white">Gabung Grup wa</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <!-- End mk -->

  <!-- Start Berita -->
  <div class="container d-flex justify-content-center mt-3">
    <div class="mk">
      <p>Berita Terkini</p>
    </div>
  </div>

  <div class="row d-flex justify-content-around">

    <?php if ($jmlNews >= 1) : ?>
      <?php foreach ($allNews as $News) : ?>
        <div class="card text-dark mb-3 p-1" style="width: 18rem;">
          <img src="img/<?= $News["img"]; ?>" class="img-top" height="200px" alt="">
          <div class="card-body">
            <h5 style="font-weight: bold;" class="card-title"><?= $News["judul"]; ?></h5>
            <p class="card-text" style="font-size: 14px;"><?= $News["tanggal"]; ?></p>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <a href="readNews.php?id=<?= $News["id"]; ?>" class="card-link">Read</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($jmlNews == 0) : ?>
      <div class="card text-dark mb-3 p-1" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Tidak Ada Informasi</h5>
        </div>
        <div class="card-body">
          <hr>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <?php if ($jmlNews >= 1) : ?>
    <div class="d-flex justify-content-center">
      <a href="" class="btn btn-light bg-blue text-white">Berita Selengkapnya</a>
    </div>
  <?php endif; ?>

  <!-- End Berita -->

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