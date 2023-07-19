<?php
session_start();
$tittle = 'Nilai siswa';
include 'layout/header-admin.php';

// membatasi halaman sebelum login
if (isset($_SESSION['username'])) {

  $fields = select("SELECT * FROM reports r INNER JOIN users u ON r.userId = u.id");

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
                    <h3 class="card-title">Nilai siswa</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered table-hover" id="data-nilai">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama siswa</th>
                          <th>Tipe</th>
                          <th>Nilai</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($fields as $field) : ?>
                          <tr>
                            <td> <?= $no++; ?> </td>
                            <td> <?= $field['child_name']; ?> </td>
                            <td><?= $field['type'] == "pilihan_ganda" ? "Pilihan ganda" : "Tebak gambar"; ?></td>
                            <td><?= $field['nilai']; ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
  </div><!-- /.container-fluid -->
  <script>
    $(document).ready(function() {
      $('#data-nilai').DataTable();
    });
  </script>


<?php

} else {
  header("Location: login-admin.php");
  exit();
}

include 'layout/footer-admin.php';

?>