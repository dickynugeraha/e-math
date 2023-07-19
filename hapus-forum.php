<?php
include 'config/app.php';
session_start();

if (isset($_SESSION['username'])) {
  $id = (int)$_GET['id'];

  if (deleteForum($id) > 0) {
    echo "<script>
                alert('Data quiz Berhasil Dihapus !');
                document.location.href = 'forum_list.php';
             </script>";
  } else {
    echo "<script>
                alert('Data quiz Gagal Dihapus !');
                document.location.href = 'forum_list.php';
             </script>";
  }
} else {
  header("Location: login-admin.php");
  exit();
}
