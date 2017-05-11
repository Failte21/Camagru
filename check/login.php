<?php
  session_start();
  header("Location: ../index.php");
  include("../check/init_db.php");
  include('../class/RegisterUser.class.php');
  if(isset($_POST['login']) && isset($_POST['password'])){
    if ($db = initDb()){
      $user = new RegisterUser($_POST['login'], $_POST['password']);
      if (!$user_name = $user->connect($db)){
        $_SESSION['signInError'] = "error";
      }else {
        $_SESSION['logged_user'] = $user_name;
      }
    }
  }
?>
