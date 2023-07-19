<?php
include('config/app.php');
ob_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- <title>GOR</title> -->
  <title> <?= $title; ?> </title>

  <link rel="icon" href="assets/img/logo.png">

  <!-- load stylesheets -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" />

  <link rel="stylesheet" href="assets/css/my.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets-template/landing-page/font-awesome-4.7.0/css/font-awesome.min.css" />
  <!-- Bootstrap style -->
  <link rel="stylesheet" href="assets-template/landing-page/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets-template/landing-page/slick/slick.css" />
  <link rel="stylesheet" href="assets-template/landing-page/slick/slick-theme.css" />
  <link rel="stylesheet" href="assets-template/landing-page/css/datepicker.css" />
  <link rel="stylesheet" href="assets-template/landing-page/css/tooplate-style.css" />
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body>
  <div class="tm-main-content" id="top">
    <div class="tm-top-bar-bg"></div>
    <div class="tm-top-bar" id="tm-top-bar" style="background-color: #189f87;">
      <!-- Top Navbar -->
      <div class="container">
        <div class="row">
          <nav class="navbar navbar-expand-lg narbar-dark">
            <a class="navbar-brand mr-auto" href="index.php">
              <img src="assets/img/logo.png" width="50px" height="50px" alt="Site logo" style="border-radius: 50%;" />
              e-Math
            </a>
            <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div id="mainNav" class="collapse navbar-collapse tm-bg-white" style="background-color: #189f87;">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.php" style="color: white">Materi<span class="sr-only" style="color: white">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="video.php" style="color: white">Video</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="quiz.php" style="color: white">Quiz</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="tebak_gambar.php" style="color: white">Tebak Gambar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="forum_diskusi.php" style="color: white">Forum</a>
                </li>
                <li class="nav-item">
                  <a style="color: white" class="nav-link" href="logout-user.php" onclick="return confirm('Are you sure want to leave ?');">Logout</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>