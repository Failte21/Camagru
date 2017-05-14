<?php
  include("User.class.php");
  class RegisterUser extends User{

    function __construct($id, $password){
      $this->login = htmlentities($id);
      $this->p1 = hash('whirlpool', htmlentities($password));
    }

    function connect($db){
        $req1 = $db->query(('select email, password, login, actif from user'));
        $req1->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($req1 as $row) {
          if ((($this->login == $row['email']) || $this->login == $row['login']) &&
              ($row['actif'] == '1') && $this->p1 == $row['password']){
            return ($row['login']);
          }
        }
        return null;
    }

    function updatePassword($db, $newPass){
      $newPass = hash('whirlpool', htmlentities($newPass));
      if ($this->connect($db)){
        $query = $db->prepare('update user set password = ? where login = ?');
        if ($query->execute(array($newPass, $this->login))){
          return (true);
        }else{
          echo "hello";
        }
      }
      return (false);
    }

    function deleteAccount($db){
        $query = $db->prepare('SELECT password FROM user WHERE login = ?');
        $query->execute(array($this->login));
        $result = $query->fetchAll();
        foreach ($result as $elem) {
          if ($elem['password'] == $this->p1){
            $d_query = $db->prepare('delete from user where login = ?');
            $d_query->execute(array($this->login));
            return true;
          }
        }
        return false;
    }
  }
?>
