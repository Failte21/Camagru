<?php
  include('init_db.php');
  $login = $_GET['login'];
  $cle = $_GET['cle'];
  if ($db = initDb()){
    $stmt = $db->prepare('SELECT cle,actif FROM user WHERE login like :login ');
    if ($stmt->execute(array(':login' => $login)) && $row = $stmt->fetch()){
      $clebdd = $row['cle'];
      $actif = $row['actif'];
    }
    if ($actif == '1'){
      header("Location: ../index.php?subscribe=already_activated");
    }else{
      if ($cle == $clebdd){
        header("Location: ../index.php/subscribe=activated");
        $stmt = $db->prepare("UPDATE user SET actif = 1 WHERE login like :login ");
        $stmt->bindParam(':login', $login);
        $stmt->execute();
      }else
        header("Location: ../index.php?subscribe=error");
    }
  }
?>
