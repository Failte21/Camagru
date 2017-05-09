<?php
  session_start();
  include('init_db.php');
  include('../class/RegisterUser.class.php');
  if (isset($_POST['newpwd']) && (isset($_POST['confirmation']))
    && isset($_POST['oldpwd'])){
    $newpwd = htmlentities($_POST['newpwd']);
    $confirm = htmlentities($_POST['confirmation']);
    if (($newpwd == $confirm)){
      if ($db = initDb()){
        $user = new RegisterUser($_SESSION['logged_user'], $_POST['oldpwd']);
        if ($user->updatePassword($db, $newpwd)){
          header('Location: ../index.php?subscribe=passwordChangeSuccess');
        }else{
          header('Location: ../index.php?page=settings&passwordChangeError=wrongPwd');
        }
      }
    }else if ($newpwd != $confirm){
      header('Location: ../index.php?page=settings&passwordChangeError=wrongPwd');
    }
  }else{
    echo "hello";
    // header('Location: ../index.php');
  }
  // header('Location: ../index.php');
 ?>
