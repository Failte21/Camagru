<?php
  Class User{

    public $mail;
    public $p1;
    private $p2;
    public $login;

    function __construct($mail, $p1, $p2, $login){
      $this->p1 = hash('whirlpool', htmlentities($p1));
      $this->p2 = hash('whirlpool', htmlentities($p2));
      $this->mail = htmlentities($mail);
      $this->login = htmlentities($login);
    }

    function checkPass(){
      return $this->p1 == $this->p2;
    }

    function checkMail($db){
      $query = $db->prepare('select email from user where email = ?');
      $query->execute(array($this->mail));
      $i = 0;
      while ($elem = $query->fetch())
        $i++;
      return $i == 0;
    }

    function checkLogin($db){
      $query = $db->prepare('select login from user where login = ?');
      $query->execute(array($this->login));
      $i = 0;
      while ($elem = $query->fetch())
        $i++;
      return $i == 0;
    }

    function sendMail($subject, $message){
      $destinataire = $this->mail;
      $entete = "From: Camagru.com" ;
      mail($destinataire, $subject, $message, $entete);
    }
  }
?>
