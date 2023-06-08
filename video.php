<?php
session_start();
$title = "Video";
include 'layout/header-user.php';

if ($_SESSION["email"]){
?>
<h3 class="mt-5 text-center" style="color: #189f87">VIDEO MATERI BANGUN DATAR</h3>
<div class="container mb-2" style="display: flex; justify-content: center;">

    <div class="video_content" style="border-radius: 15px;
  position: relative;
  margin-top: 3rem;
  padding: 4rem;">
        <video style="object-fit: cover;
          width: 100%; 
          height: 100%;
          z-index: 10;
          " controls>
          <source src="assets/video/video1.mp4" type="video/mp4">
          <source src="assets/video/video1.ogg" type="video/ogg">
          Your browser does not support the video tag.
        </video>
    </div>
</div>
<h3 class="mt-5 text-center" style="color: #189f87">VIDEO MATERI BANGUN RUANG</h3>
<div class="container mb-5" style="display: flex; justify-content: center;">
    <div class="video_content" style="border-radius: 15px;
  position: relative;
  margin-top: 3rem;
  padding: 4rem;">
        <video style="object-fit: cover;
          width: 100%; 
          height: 100%;
          z-index: 10;
          " controls>
          <source src="assets/video/video1.mp4" type="video/mp4">
          <source src="assets/video/video1.ogg" type="video/ogg">
          Your browser does not support the video tag.
        </video>
    </div>
</div>
<?php
} else {
    header("Location: login-user.php");
    exit();
}
include 'layout/footer-user.php';
?>