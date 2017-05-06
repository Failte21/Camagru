<?php
if ($_POST['msg']){
  $comment = new Comment();
  $comment->add($_GET['id'], $_SESSION['logged_user'], htmlentities($_POST['msg']));
}
 ?>
