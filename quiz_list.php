<?php
session_start();
$tittle = 'Data quiz';
include 'layout/header-admin.php';

// membatasi halaman sebelum login
if (isset($_SESSION['username'])) {

  $fields = select("SELECT * FROM quiz q INNER JOIN answers a ON q.id = a.quizId WHERE q.type != 'tebak_gambar'");

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

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Data Quiz</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <a href="tambah-quiz.php" class="btn btn-primary btn-small mb-2"> <i class="fas fa-plus"></i> Tambah</a>
                    <table class="table table-bordered table-hover">
                      <tr>
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th>Gambar</th>
                        <th>Pilihan a</th>
                        <th>Pilihan b</th>
                        <th>Pilihan c</th>
                        <th>Pilihan d</th>
                        <th>Jawaban benar</th>
                        <th>Deskripsi jawaban</th>
                        <th>Aksi</th>
                      </tr>
                      <?php $no = 1; ?>
                      <?php foreach ($fields as $field) : ?>
                        <tr>
                          <td> <?= $no++; ?> </td>
                          <td> <?= $field['question']; ?> </td>
                          <td> <img width="120px" src="<?= $field['img']; ?>" alt="" srcset=""> </td>
                          <td><?= $field['a']; ?></td>
                          <td><?= $field['b']; ?></td>
                          <td><?= $field['c']; ?></td>
                          <td><?= $field['d']; ?></td>
                          <td><?= $field['correct']; ?></td>
                          <td><?= $field['description']; ?></td>
                          <td width="160px" class="text-center">
                            <a href="ubah-pilihan_ganda.php?id=<?= $field['quizId']; ?>" class="btn btn-sm btn-warning" style="color: white;"><i class="fas fa-edit" style="margin-right: 3px;"></i>Edit</a>
                            <a href="hapus-quiz.php?id=<?= $field['quizId']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin mengahapus data field keluar ini ?')"><i class="fas fa-trash-alt" style="margin-right: 3px;"></i>Hapus</a>
                          </td>
                        </tr>

                      <?php endforeach; ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
  </div><!-- /.container-fluid -->



<?php

} else {
  header("Location: login-admin.php");
  exit();
}

include 'layout/footer-admin.php';

?>