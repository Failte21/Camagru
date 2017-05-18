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

    function changePass($db, $newPass){
        $newPass = hash('whirlpool', htmlentities($newPass));
        $query = $db->prepare('update user set password = ? where login = ?');
        if ($query->execute(array($newPass, $this->login))){
          return (true);
        }
        return (false);
    }

    function updatePassword($db, $newPass){
      return ($this->connect($db) && $this->changePass($db, $newPass));
    }

    function deleteAccount($db){
        $query = $db->prepare('SELECT password FROM user WHERE login = ?');
        $query->execute(array($this->login));
        $result = $query->fetchAll();
        foreach ($result as $elem) {
          if ($elem['password'] == $this->p1){
            $d_query = $db->prepare('delete from user where login = ?');
            $d_query->execute(array($this->login));
            $d_query = $db->prepare('DELETE FROM picture WHERE login_user = ?');
            $d_query->execute(array($this->login));
            $d_query = $db->prepare('DELETE FROM like_picture WHERE login_like = ?');
            $d_query->execute(array($this->login));
            $d_query = $db->prepare('DELETE FROM comment_picture WHERE login_comment = ?');
            $d_query->execute(array($this->login));
            return true;
          }
        }
        return false;
    }

    function getUserFromKey($db, $key){
      $query = $db->prepare("select login from user where cle = ?");
      if ($query->execute(array($key))){
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        $this->login = $array[0]["login"];
      }
    }
  }
?>
