<?php
Class Comment{

  function add($id_picture, $login_comment, $comment){
    if ($db = initDb()){
      $query = $db->prepare('INSERT INTO `comment_picture` (`id_picture`, `login_comment`, `comment`) VALUES (?, ?, ?);');
      $query->execute(array($id_picture, $login_comment, $comment));
      $this->notification($id_picture, $login_comment);
    }
  }

  function display($id_picture){
    if ($db = initDb()){
      $query = $db->prepare('SELECT login_comment, comment FROM comment_picture WHERE id_picture LIKE ? order by id desc');
      $query->execute(array($id_picture));
      $result = $query->fetchAll();
      return $result;
    }
  }


  function notification($id_picture, $login_comment){
    if ($db = initDb()){
      session_start();
      $query = $db->prepare('SELECT login_user FROM picture WHERE id LIKE ?');
      $query->execute(array($id_picture));
      $result = $query->fetchAll();
      $query = $db->prepare('SELECT email, login FROM user WHERE login LIKE ?');
      $query->execute(array($result[0]['login_user']));
      $result = $query->fetchAll();
      $email = $result[0]['email'];
      if ($_SESSION['logged_user'] != $result[0]['login']){
        $destinataire = $email;
        $sujet = 'Someone commented your photo on Camagru';
        $entete = 'From: Camagru.com';
        $message = 'Hello babe,
          '.$login_comment.' just commented your photo! (you are becoming famous babe).

          -------------
          This is an automatic mail, so pls don\'t respond..
        ';
        mail($destinataire, $sujet, $message, $entete);
      }
    }
  }
}
 ?>
