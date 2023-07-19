<?php
session_start();
$tittle = 'Tambah forum';
include 'layout/header-admin.php';


// membatasi halaman sebelum login
if (isset($_SESSION['username'])) {

  // cek apakah tombol tambah ditekan
  if (isset($_POST['tambah'])) {
    if (createForum($_POST) > 0) {
      echo "<script>
          alert('Data forum Berhasil Ditambahkan !');
          document.location.href = 'forum_list.php';
       </script>";
    } else {
      echo "<script>
          alert('Data forum Gagal Ditambahkan !');
          document.location.href = 'forum_list.php';
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
          <h2 style="text-align: center;"> Tambah Data forum</h2>

          <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>

          <input type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s') ?>">

          <button type="submit" name="tambah" class="btn btn-primary mb-3" style="float: right; margin-right: 10px;">Tambah</button>
        </form>

      </div>
    </section>
    <!-- /.content -->
  </div>

<?php
} else {
  header("Location: login-admin.php");
  exit();
}


include 'layout/footer-admin.php';
?>