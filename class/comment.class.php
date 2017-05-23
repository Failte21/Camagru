<?php
Class Comment{
  var $comment = "";
  var $id_picture = 0;
  var $login_comment = "";

  function __construct($id_picture, $login_comment, $comment){
    $this->comment = $comment;
    $this->login_comment = $login_comment;
    $this->id_picture = $id_picture;
  }

  function add(){
    if ($db = initDb()){
      $query = $db->prepare('INSERT INTO `comment_picture` (`id_picture`, `login_comment`, `comment`) VALUES (?, ?, ?);');
      $query->execute(array($this->id_picture, $this->login_comment, $this->comment));
      $this->notification($this->id_picture, $this->login_comment);
    }
  }

  function display(){
    if ($db = initDb()){
      $query = $db->prepare('SELECT login_comment, comment FROM comment_picture WHERE id_picture LIKE ? order by id desc');
      $query->execute(array($this->id_picture));
      $result = $query->fetchAll();
      return $result;
    }
  }

  function notification(){
    if ($db = initDb()){
      session_start();
      $query = $db->prepare('SELECT login_user FROM picture WHERE id = ?');
      $query->execute(array($this->id_picture));
      $result = $query->fetchAll();
      $query = $db->prepare('SELECT email, login FROM user WHERE login = ?');
      $query->execute(array($result[0]['login_user']));
      $result = $query->fetchAll();
      $email = $result[0]['email'];
      if ($_SESSION['logged_user'] != $result[0]['login']){
        $destinataire = $email;
        $sujet = 'Someone commented your photo on Camagru';
        $entete = 'From: Camagru.com';
        $message = 'Hello '.$result[0]['login'].' !,
          '.$this->login_comment.' just commented your photo! (you are becoming famous) :
          "'.$this->comment.'"
          -------------
          This is an automatic mail, please don\'t respond..
        ';
        mail($destinataire, $sujet, $message, $entete);
      }
    }
  }
}
 ?>
