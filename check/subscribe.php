<?php
  session_start();
  include("../class/User.class.php");
  include("init_db.php");
  if (isset($_POST['email']) && isset($_POST['password'])
    && isset($_POST['confirm']) && isset($_POST['login']))
  {
    $user = new User($_POST['email'], $_POST['password'], $_POST['confirm'], $_POST['login']);
    if ($db = initDb()){
      if (!$user->checkPass())
        header("Location: ../index.php?signup_error=different_passwd");
      else if (!$user->checkMail($db))
          header("Location: ../index.php?signup_error=mail_exists");
      else if (!$user->checkLogin($db))
        header("Location: ../index.php?signup_error=login_exists");
      else {
        header("Location: ../index.php?subscribe=success");
        $query = $db->prepare('insert into user(email, password, login, cle) values(:email, :password, :login, :cle)');
        $query->execute(array('email' => $user->mail, 'password' => $user->p1, 'login' => $user->login, 'cle' =>hash('whirlpool', $user->login.$user->p1)));
        $destinataire = $user->mail;
        $sujet = "Activer votre compte" ;
        $entete = "From: inscription_camagru.com" ;

        $message = 'Bienvenue sur CAMAGRU,

        Pour activer votre compte, veuillez cliquer sur le lien ci dessous
        ou copier/coller dans votre navigateur internet.

        http://localhost:8080/camagru/check/validation.php?login='.urlencode($user->login).'&cle='.urlencode(hash('whirlpool', $user->login.$user->p1)).'


        ---------------
        Ceci est un mail automatique, Merci de ne pas y répondre.';


        mail($destinataire, $sujet, $message, $entete);
        $_SESSION['subscribed_user'] = $_POST['login'];
      }
    }
  }
?>
