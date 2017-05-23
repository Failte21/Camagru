<?php
  session_start();
  include("init_db.php");
  include("../class/comment.class.php");
  if ($_POST['msg']){
    $comment = new Comment(htmlentities($_GET['id']), $_SESSION['logged_user'], htmlentities($_POST['msg']));
    $comment->add();
    header("Location: ../index.php?page=comment&id=".htmlentities($_GET['id']));
  }
?>
