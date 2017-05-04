<?php
include("init_db.php");

if ($db = initDb()){
  $query = $db->prepare('DELETE FROM picture WHERE id like ?');
  $query->execute(array($_GET['id']));
}
if ($_GET['page'] == 'mygallery')
  header('Location: ../view/mygallery.php');
if ($_GET['page'] == 'explorer')
  header('Location: ../view/gallery.php');
 ?>
