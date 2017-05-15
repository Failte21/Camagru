<?php
  include("init_db.php");

  print_r($_GET);
  if ($db = initDb()){
    $query = $db->prepare('DELETE FROM picture WHERE id = ?');
    $query->execute(array(htmlentities($_GET['id'])));
    $query = $db->prepare('DELETE FROM like_picture WHERE id_picture LIKE ?');
    $query->execute(array($_GET['id']));
    $query = $db->prepare('DELETE FROM comment_picture WHERE id_picture LIKE ?');
    $query->execute(array($_GET['id']));
  }
?>
