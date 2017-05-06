<?php
  include('init_db.php');
  include('../class/User.class.php');
  session_start();
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
      header("Location: ../view/forgotten_pass.php?result=mail_sent");
    }else{
      header("Location: ../view/forgotten_pass.php?result=unknown_mail");
    }
  }
?>
