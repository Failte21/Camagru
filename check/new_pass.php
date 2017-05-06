<?php
session_start();
include('init_db.php');
if (!$_SESSION['loggued_user'])
{
  if ($_POST['p1'] == $_POST['p2']){
    if ($db = initDb()){
      $pwd = hash('whirlpool', $_POST['p1']);
      $cle = $_SESSION['cle'];
      $query = $db->prepare('UPDATE user SET password =\''. $pwd . '\' WHERE cle like :cle');
      $query->execute(array(':cle' => $cle));
      unset($_SESSION['cle']);
      header('Location: ../index.php');
    }
  }
  else {
    header('Location: ../view/validation.php?result=wrong_password');
  }
}
?>
