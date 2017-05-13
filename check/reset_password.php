<?php
  header("location: ../index.php?page=resetPassword");
  session_start();
  include('init_db.php');
  include('../class/User.class.php');
  if ($db = initDb()){
    $user = new User($_POST['email'], null, null, null);
    if (!$user->checkMail($db)){
      $query = $db->prepare('SELECT cle FROM user WHERE email like :email');
      $query->execute(array(':email' => $_POST['email']));
      $row = $query->fetch();
      $user->sendMail("Reset your password",
      "Click on this link or copy/paste it in your browser to reset your password:

      http://localhost/camagru/view/new_pass.php?cle=".urlencode($row['cle'])."
      ---------------
      Ceci est un mail automatique, Merci de ne pas y répondre.");
      header("location: ../index.php?subscribe=resetSuccess");
    }else{
      $_SESSION['resetPassError'] = "This mail doesn't exists";
    }
  }else{
    $_SESSION['resetPassError'] = "An error occured";
  }
?>
