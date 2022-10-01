<?php
session_start();
require 'admin/sistem/functions.php';

$error = "";
if (isset($_POST["login"])) {
  global $conn;
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  // cek username
  if (mysqli_num_rows($result) === 1) {

    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {

      if ($row['level'] == "admin") {
        // set session
        $_SESSION["login"] = $row['id'];

        header("Location: admin/index.php");
        exit;
      } else if ($row['level'] == "user") {
        // set session
        $_SESSION["user"] = $row['id'];

        header("Location: user/index.php");
        exit;
      }
    }
  }
  $error = true;
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RA3 | Login</title>
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
  <div class="mt-3">
    <div class="d-flex justify-content-center  mb-3">
      <div class="mk">
        <p>Login Admin</p>
      </div>
    </div>
    <form action="" method="post">
      <div class="container p-3 bg-blue shadow mb-5" style="border-radius: 10px;">
        <?php if ($error) : ?>
          <p class="text-center text-danger">username atau password tidak sesuai!</p>
        <?php endif; ?>
        <div class="mb-3">
          <label for="name" class="form-label text-white">Username</label>
          <input type="text" id="name" class="form-control" name="username" required>
        </div>
        <div class="mb-3">
          <label for="Password" class="form-label text-white">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
          <button class="btn bg-orange form-control text-white" name="login" type="submit">Login</button>
        </div>
      </div>
    </form>
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