
<?php
include 'config/app.php';
session_start();

   if (isset($_SESSION['email'])) {
      $data_quiz =  select("SELECT * FROM quiz INNER JOIN answers ON quiz.id = answers.quizId WHERE quiz.type = 'tebak_gambar'");
   }
   echo json_encode($data_quiz);
?>