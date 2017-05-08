<?php
session_start();
include('init_db.php');
if (isset($_POST['newpwd'] && isset($_POST['confirmation']))
  && isset($_POST['oldpwd'])){
    if (($_POST['newpwd'] == $_POST['confirmation'])){
      if ($db = initDb()){
        $query = $db->prepare('SELECT password FROM user WHERE login LIKE ?');
        $query->execute(array($_SESSION['logged_user']));
        $result = $query->fetchAll();
        $pwd = $result[0]['password'];
        if ($pwd == hash('whirlpool', $_POST['oldpwd'])){
          $query = $db->prepare('UPDATE user SET password = ? WHERE login LIKE ?');
          $query->execute(array(hash('whirlpool', $_POST['newpwd']), $_SESSION['logged_user']));
          header('Location: index.php?subscribe=passwordChangeSuccess');
        }
      }
    }else($_POST['newpwd'] != $_POST['confirmation']){
      header('Location: index.php?page=settings&passwordChangeError=wrongPwd');
    }
  }else{
    header('Location: index.php');
  }
 ?>
