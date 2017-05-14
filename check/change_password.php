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
          header("location: ../index.php?subscribe=passwordChangeSuccess");
        }else{
          $_SESSION["changePassError"] = "Wrong password";
        }
      }else{
        $_SESSION["changePassError"] = "An error occured";
    }
  }else{
    $_SESSION["changePassError"] = "The two passwords must be identicals";
  }
}
?>
