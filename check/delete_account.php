<?php
session_start();
include('init_db.php');
if ($db = initDb()){
  if ($_SESSION['logged_user']){
    include("../class/RegisterUser.class.php");
    $user = new RegisterUser($_SESSION['logged_user'], $_POST['password']);
    if (!$user->deleteAccount($db)){
      header("Location: ../index.php?page=settings&DeleteAccountError=wrongPwd");
    }
    else{
      header("Location: ../index.php?subscribe=accoutDeleted");
      unset($_SESSION[logged_user]);
    }
  }
}
?>
