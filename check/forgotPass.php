<?php
  // header("location: ../index.php?page=resetPassword");
  session_start();
  include('init_db.php');
  include('../class/RegisterUser.class.php');
  if (isset($_POST['newPass']) && (isset($_POST['confirm']))){
    $newPass = htmlentities($_POST['newPass']);
    $confirm = htmlentities($_POST['confirm']);
    if (($newPass == $confirm)){
      if ($db = initDb()){
        $user = new RegisterUser($_SESSION['login'], null);
        if ($user->changePass($db, $newPass)){
          header("location: ../index.php?subscribe=passwordChangeSuccess");
        }else{
          $_SESSION["resetPassError"] = "An error occured";
        }
      }else{
        $_SESSION["resetPassError"] = "An error occured";
    }
  }else{
    $_SESSION["resetPassError"] = "The two passwords must be identicals";
  }
}
?>
