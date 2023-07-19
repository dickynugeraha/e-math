<?php
session_start();
include('config/app.php');
ob_start();


if (!isset($_SESSION['username'])) {
  if (isset($_POST['login'])) {
    loginAdmin($_POST);
  }
?>

  <!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Admin Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets-template/plugins/fontawesome-free/css/all.min.css">

    <!-- Favicons -->
    <link rel="icon" href="assets/img/logo.png">
    <meta name="theme-color" content="#712cf9">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center" style="width: 30rem; margin:auto;">

    <main class="form-signin">
      <form action="" method="POST">

        <img src="assets/img/logo.png" alt="" width="130" height="130" style="border-radius: 50%">

        <h1 class="h3 mb-3 fw-normal"> <b>Admin Login</b><i class="fas fa-key" style="margin-left: 10px;"></i></h1>

        <?php if (isset($_GET['error'])) { ?>
          <b>
            <p class="error" style="background-color: red; color: white; height: 25px; width: 300px; border-radius: 7px;"><?php echo $_GET['error']; ?></p>
          </b>
        <?php } ?>

        <div class="form-group mb-2">
          <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" required>
        </div>
        <div class="form-group mb-3">
          <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Login</button>

      </form>
    </main>

  </body>

  </html>


<?php

} else {
  header("Location: dashboard.php");
  exit();
}

include 'layout/footer-admin.php';

?>