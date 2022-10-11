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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RA3 - Login KM</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/ico.jpg" type="images/x-icon">
    <link rel="stylesheet" href="css/login.css">
</head>
<body class="bg-eaeaea">

        <form action="" class="bg-white login shadow-sm" method="post">
            <div class="d-flex justify-content-center">
                <img src="img/ico.jpg" class="rounded-circle" width="100" height="100" alt="">
            </div>
            <div class="d-flex justify-content-center mt-2 mb-2">
                <h1 class="fs-4">Masuk - RA3</h1>
            </div>
            <?php if($error): ?>
            <div class="alert alert-danger d-flex justify-content-between" id="alertError2" style="height: 55px;" role="alert">
            <p>Password atau username salah!</p> <button class="btn btn-close" type="button" onclick="closeAlert2();"></button>
            </div>
            <?php endif; ?>
            <div class="mb-3">
                <input type="text" class="form-control-lg form-control" placeholder="Username" required name="username">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control-lg form-control" placeholder="Password" required name="password">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary fs-5 text-white form-control" name="login" type="submit">Masuk</button>
            </div>
            <p class="text-center text-secondary" style="font-size: 12px;">@2022 <a href="http://yanz.epizy.com/">yanz</a></p>
        </form>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        function closeAlert2(){
            let alertError = document.getElementById("alertError2");
            alertError.setAttribute("class","d-none");
        }
    </script>
</body>
</html>