<?php
  // header("index.php?subscribe=error");
  session_start();
  include('init_db.php');
  include('../class/RegisterUser.class.php');
  $key = htmlentities($_GET["key"]);
  if ($db = initDb()){
    $user = new RegisterUser(null, null);
    $user->getUserFromKey($db, $key);
    if ($user->login){
      $_SESSION["login"] = $user->login;
      header("location: ../index.php?page=resetPassword");
    }
  }
?>
