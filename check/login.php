<?php
  session_start();
  include('../class/RegisterUser.class.php');
  if(isset($_POST['login']) && isset($_POST['password'])){
    if ($db = initDb()){
      $user = new RegisterUser($_POST['login'], $_POST['password']);
      if (!$user_name = $user->connect($db)){
        header("Location: ../index.php?login_error=error");
      }else {
        $_SESSION['logged_user'] = $user_name;
        header("Location: ../index.php");
      }
    }
  }
?>
