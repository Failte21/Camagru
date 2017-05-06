<?php
include('../class/picture.class.php');
session_start();
if ($_SESSION['logged_user']){
  $id_picture = $_GET['id'];
  $login = $_SESSION['logged_user'];
  $picture = new Picture($id_picture);
  $picture->like($id_picture, $login);
  header("Location: /camagru/view/gallery.php");
}
 ?>
