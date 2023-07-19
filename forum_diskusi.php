<?php
session_start();
$title = "Forum ";
include 'layout/header-user.php';

if ($_SESSION["email"]) {
  $fields = select("SELECT * FROM forum");
  if (count($fields) == 0) {
    $fields = select("SELECT * FROM forum");
  }

  // var_dump($fields);
  // die();

  if (isset($_POST['tambah-diskusi'])) {
    if (createDiskusi($_POST) > 0) {
      echo "<script>
                alert('Data Diskusi Berhasil Diperbaharui !');
            </script>";
    } else {
      echo "<script>
                alert('Data Diskusi Gagal Diperbaharui !');
            </script>";
    }
  }
?>
  <h3 class="my-5 text-center" style="color: #189f87">FORUM DISKUSI</h3>
  <div style="min-height: 100vh; width:50rem;" class="container">

    <?php foreach ($fields as $field) : ?>
      <?php $forumId =  $field['id'] ?>
      <div class="card mb-4 p-3">
        <div class="d-flex justify-content-between">
          <h5 class="mb-0"><?php echo $field["title"] ?></h5>
          <a class="mb-0" style="color: blue; text-decoration:underline" id="comment-<?php echo $forumId ?>">Comment</a>
        </div>
        <div class="mt-2" id="add-forum-<?php echo $forumId ?>" style="display: none;">
          <form action="" method="post">
            <textarea type="text" name="description" id="description" class="form-control mb-3"></textarea>
            <input type="hidden" name="forumId" value="<?php echo $field["id"] ?>">
            <input type="hidden" name="name" value="<?php echo $_SESSION["name"] ?>">
            <input type="hidden" name="user_status" value="Siswa">
            <div class="d-flex justify-content-end">
              <button type="submit" name="tambah-diskusi" class="btn btn-info btn-sm float-end">Submit</button>
            </div>
          </form>
        </div>
        <hr>
        <?php
        $field_items = select("SELECT * FROM forum f INNER JOIN forum_item i ON f.id = i.forumId WHERE i.forumId = $forumId");

        // var_dump($field_items);
        // die();
        foreach ($field_items as $item) :
        ?>
          <p class="mb-0"><b><?php echo  $item["user_status"] ?> (<?php echo $item["name"] ?>)</b> - <?php echo $item["description"] ?></p>
        <?php endforeach; ?>
      </div>
      <script>
        $("#comment-<?php echo $forumId ?>").click(function() {
          $("#add-forum-<?php echo $forumId ?>").toggle();
        });
      </script>

    <?php endforeach; ?>

  </div>
<?php
} else {
  header("Location: login-user.php");
  exit();
}
include 'layout/footer-user.php';
?>