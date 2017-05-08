<?php
  session_start();
  if ($_SESSION['logged_user']){
    if (!$_POST['password']){
      header("Location: camagru/view/account.php?error=noPassword");
    }else {
      include("../class/RegisterUser.class.php");
      $user = new RegisterUser($_SESSION['logged_user'], $_POST['password']);
      if (!$user->deleteAccount()){
        header("Location: /camagru/view/account.php?error=wrongPassword");
        unset($_SESSION[logged_user]);
      }
      else{
        header("Location: /camagru/index.php?result=account_deleted");
      }
    }
  }
  unset($_SESSION['logged_user']);
?>
