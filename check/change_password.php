<?php
session_start();
include('init_db.php');
if (($_POST['newpwd'] == $_POST['confirmation'])){
  if ($db = initDb()){
    $query = $db->prepare('SELECT password FROM user WHERE login LIKE ?');
    $query->execute(array($_SESSION['logged_user']));
    $result = $query->fetchAll();
    $pwd = $result[0]['password'];
    if ($pwd == hash('whirlpool', $_POST['oldpwd'])){
      $query = $db->prepare('UPDATE user SET password = ? WHERE login LIKE ?');
      $query->execute(array(hash('whirlpool', $_POST['newpwd']), $_SESSION['logged_user']));
      header('Location: /camagru/index.php');
    }
  }
}
else if($_POST['newpwd'] != $_POST['confirmation']){
  header('Location: /camagru/check/account.php?pwd_result=wrongpwd');
}
 ?>
