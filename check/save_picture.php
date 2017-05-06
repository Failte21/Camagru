<?php
  if (!isset($_SESSION))
    session_start();
  include("init_db.php");
  $path = '../tmp.png';
  $type = pathinfo($path, PATHINFO_EXTENSION);
  $base = file_get_contents("../img/tmp.png");
  $base64 = 'data:image/' . $type . ';base64,' . base64_encode($base);
  if ($db = initdB()){
    $query = $db->prepare('INSERT INTO picture(login_user, img) VALUES(:login_user, :img)');
    $query->execute(array(':login_user' => $_SESSION['logged_user'], ':img' => $base64));
  }
  unlink("../img/tmp.png");
?>
