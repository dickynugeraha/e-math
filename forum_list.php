<?php
session_start();
$tittle = 'Data quiz';
include 'layout/header-admin.php';

// membatasi halaman sebelum login
if (isset($_SESSION['username'])) {

  $fields = select("SELECT * FROM forum");

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
                    <h3 class="card-title">Forum diskusi</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <a href="tambah-forum.php" class="btn btn-primary btn-small mb-2"> <i class="fas fa-plus"></i> Tambah</a>
                    <table class="table table-bordered table-hover">
                      <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Upload</th>
                        <th>Aksi</th>
                      </tr>
                      <?php $no = 1; ?>
                      <?php foreach ($fields as $field) : ?>
                        <tr>
                          <td> <?= $no++; ?> </td>
                          <td><?= $field['title']; ?></td>
                          <td><?= $field['created_at']; ?></td>
                          <td width="180px" class="text-center">
                            <a href="detail-forum.php?id=<?= $field['id']; ?>" class="btn btn-sm btn-info" style="color: white;"><i class="fas fa-info" style="margin-right: 3px;"></i>Detail</a>
                            <a href="hapus-forum.php?id=<?= $field['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin mengahapus data field keluar ini ?')"><i class="fas fa-trash-alt" style="margin-right: 3px;"></i>Hapus</a>
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