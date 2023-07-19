<?php
session_start();
$tittle = 'Edit tebak gambar';
include 'layout/header-admin.php';

// membatasi halaman sebelum login
if (isset($_SESSION['username'])) {

  $id = (int)$_GET['id'];

  $field = select("SELECT * FROM quiz q JOIN answers a ON a.quizId = q.id WHERE q.id = $id AND q.type='tebak_gambar'")[0];

  // cek apakah tombol tambah ditekan
  if (isset($_POST['ubah-tebak-gambar'])) {
    if (updateTebakGambar($_POST) > 0) {
      echo "<script>
                alert('Data quiz berhasil diperbaharui !');
                document.location.href = 'tebak_gambar_list.php';
             </script>";
    } else {
      echo "<script>
                alert('Data quiz bagal diperbaharui !');
                document.location.href = 'tebak_gambar_list.php';
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
          <h2 style="text-align: center;">Ubah data tebak gambar</h2>

          <div class="mb-3">
            <label for="question" class="form-label">Pertanyaan</label>
            <input value="<?php echo $field['question'] ?>" type="text" class="form-control" id="question" name="question" placeholder="Pertanyaan ..." required>
          </div>

          <input type="hidden" name="quizId" value="<?php echo $field["quizId"] ?>">

          <div class="mb-3">
            <label for="a" class="form-label">Image url jawaban a</label>
            <input value="<?php echo $field['a'] ?>" type="text" class="form-control" id="a" name="a" placeholder="Image url jawaban a ..." required>
          </div>

          <div class="mb-3">
            <label for="b" class="form-label">Image url jawaban b</label>
            <input value="<?php echo $field['b'] ?>" type="text" class="form-control" id="b" name="b" placeholder="Image url jawaban b ..." required>
          </div>

          <div class="mb-3">
            <label for="c" class="form-label">Image url jawaban c</label>
            <input value="<?php echo $field['c'] ?>" type="text" class="form-control" id="c" name="c" placeholder="Image url jawaban c ..." required>
          </div>

          <div class="mb-3">
            <label for="d" class="form-label">Image url jawaban d</label>
            <input value="<?php echo $field['d'] ?>" type="text" class="form-control" id="d" name="d" placeholder="Image url jawaban d ..." required>
          </div>

          <div class="mb-3">
            <label for="correct" class="form-label">Jawaban yang benar (1 character)</label>
            <input value="<?php echo $field['correct'] ?>" type="text" class="form-control" id="correct" name="correct" placeholder="(a,b,c,d)" required>
          </div>

          <button type="submit" name="ubah-tebak-gambar" class="btn btn-primary mb-3" style="float: right; margin-right: 10px;">Ubah</button>
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