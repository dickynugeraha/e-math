<?php
session_start();
$tittle = 'Edit quiz';
include 'layout/header-admin.php';

// membatasi halaman sebelum login
if (isset($_SESSION['username'])) {

  $id = (int)$_GET['id'];

  $field = select("SELECT * FROM quiz q JOIN answers a ON a.quizId = q.id WHERE q.id = $id AND q.type='pilihan_ganda'")[0];

  // cek apakah tombol tambah ditekan
  if (isset($_POST['ubah-quiz'])) {
    if (updatePilihanGanda($_POST) > 0) {
      echo "<script>
                alert('Data quiz berhasil diperbaharui !');
                document.location.href = 'quiz_list.php';
             </script>";
    } else {
      echo "<script>
                alert('Data quiz gagal diperbaharui !');
                document.location.href = 'quiz_list.php';
             </script>";
    }
  }


?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


        <form action="" method="post" enctype="multipart/form-data" style="width: 95%; margin-left: 40px; min-height:900px">
          <h2 style="text-align: center;"> Ubah data quiz</h2>

          <div class="mb-3">
            <label for="question" class="form-label">Pertanyaan</label>
            <input value="<?php echo $field["question"] ?>" type="text" class="form-control" id="question" name="question" placeholder="Pertanyaan ..." required>
          </div>

          <input type="hidden" name="quizId" value="<?php echo $field["quizId"] ?>">

          <div class="mb-3">
            <label for="Image url" class="form-label">Image url</label>
            <input value="<?php echo $field["img"] ?>" type="text" class="form-control" id="Image url" name="img" placeholder="Image url ..." required>
          </div>

          <div class="mb-3">
            <label for="a" class="form-label">Jawaban a</label>
            <input value="<?php echo $field["a"] ?>" type="text" class="form-control" id="a" name="a" placeholder="Jawaban a ..." required>
          </div>

          <div class="mb-3">
            <label for="b" class="form-label">Jawaban b</label>
            <input value="<?php echo $field["b"] ?>" type="text" class="form-control" id="b" name="b" placeholder="Jawaban b ..." required>
          </div>

          <div class="mb-3">
            <label for="c" class="form-label">Jawaban c</label>
            <input value="<?php echo $field["c"] ?>" type="text" class="form-control" id="c" name="c" placeholder="Jawaban c ..." required>
          </div>

          <div class="mb-3">
            <label for="d" class="form-label">Jawaban d</label>
            <input value="<?php echo $field["d"] ?>" type="text" class="form-control" id="d" name="d" placeholder="Jawaban d ..." required>
          </div>

          <div class="mb-3">
            <label for="correct" class="form-label">Jawaban yang benar (1 character)</label>
            <input value="<?php echo $field["correct"] ?>" type="text" class="form-control" id="correct" name="correct" placeholder="(a,b,c,d)" required>
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Deskripsi jawaban</label>
            <textarea type="text" class="form-control" id="description" name="description"><?php echo $field["description"] ?></textarea>
          </div>

          <button type="submit" name="ubah-quiz" class="btn btn-primary mb-3" style="float: right; margin-right: 10px;">Ubah</button>
        </form>

      </div>
    </section>
    <!-- /.content -->
  </div>

<?php

} else {
  header("Location: login-template.php");
  exit();
}

include 'layout/footer-admin.php';

?>