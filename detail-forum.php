<?php
session_start();
$tittle = 'Forum diskusi';
include 'layout/header-admin.php';

// membatasi halaman sebelum login
if (isset($_SESSION['username'])) {

  $id = (int)$_GET['id'];

  $fields = select("SELECT * FROM forum f INNER JOIN forum_item i ON f.id = i.forumId WHERE i.forumId = $id");
  if (count($fields) == 0) {
    $fields = select("SELECT * FROM forum_item WHERE forumId = $id");
  }


  if (isset($_POST['tambah-diskusi'])) {
    if (createDiskusi($_POST) > 0) {
      echo "<script>
                alert('Data diskusi Berhasil ditambah !');
                document.location.href = 'forum_list.php';
             </script>";
    } else {
      echo "<script>
                alert('Data diskusi Gagal ditambah !');
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
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="px-3 pt-3">

                <button style="width: 12rem;" id="comment" class="btn btn-primary btn-sm mb-2"> <i class="fas fa-plus"></i> Tambah diskusi</button>
              </div>
              <div class="card-body" class="mt-2" id="add-forum" style="display: none;">
                <form action="" method="post">
                  <label for="name" class="form-label">Nama guru</label>
                  <input type="text" name="name" id="name" class="form-control mb-3">
                  <label for="description" class="form-label">Deskripsi</label>
                  <textarea type="text" name="description" id="description" class="form-control mb-3"></textarea>
                  <input type="hidden" name="forumId" value="<?php echo $id ?>">
                  <input type="hidden" name="user_status" value="Guru">
                  <div class="d-flex justify-content-end">
                    <button type="submit" name="tambah-diskusi" class="btn btn-primary btn-sm float-end">Submit</button>
                  </div>
                </form>
              </div>
              <script>
                $("#comment").click(function() {
                  $("#add-forum").toggle();
                });
              </script>
              <hr>
              <?php foreach ($fields as $field) : ?>
                <div class="px-3">
                  <p><b><?php echo $field["user_status"] ?> (<?php echo $field["name"] ?>) </b> - <?php echo $field["description"] ?></p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
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