<?php
Class Picture{

  function displayPictures($login){
    if ($db = initdB()){
      $query = $db->prepare('select img from picture where login_user = ?
        order by id desc');
      $query->execute(array($login));
      $array = $query->fetchAll();
      foreach ($array as $elem) {
        ?><img src="<?php echo $elem['img']?>" alt="preview_photo" /><?php
      }
    }
  }

  function nb_like($id_picture){
    if($db = initdB()){
      $query = $db->prepare('SELECT nb FROM picture WHERE id like :id_picture');
      $query->execute(array(':id_picture' => $id_picture));
      $result = $query->fetchAll();
      return ($result[0]['nb']);
    }
  }

  function isliked($id_picture, $login){
    if ($db = initDb()){
      $ok = 0;
      $qu = $db->prepare('SELECT * from like_picture');
      $qu->execute();
      $result = $qu->fetchAll();
      foreach($result as $elem){
        if ($elem['id_picture'] == $id_picture && $elem['login_like'] == $login)
          return(1);
      }
      return(0);
    }
  }

  function like($id_picture, $login){
    include('../check/init_db.php');
    if ($db = initDb()){
      $ok = 0;
      $qu = $db->prepare('SELECT * from like_picture');
      $qu->execute();
      $result = $qu->fetchAll();
      foreach($result as $elem){
      if ($elem['id_picture'] == $id_picture && $elem['login_like'] == $login){
          $nb_like = $this->nb_like($id_picture);
          $nb_like--;
          $this->update($id_picture, $login, 0, $nb_like);
          $ok = 1;
        }
      }
      if ($ok == 0){
        $nb_like = $this->nb_like($id_picture);
        $nb_like++;
        $this->update($id_picture, $login, 1, $nb_like);
        $this->notification($id_picture, $login);
      }
    }
  }

  function update($id_picture, $login, $action, $nb){
    if ($action == 0){
      if ($db = initdB()){
        $query = $db->prepare('DELETE FROM like_picture WHERE login_like LIKE ? && id_picture LIKE ?');
        $query->execute(array($login, $id_picture));
      }
    }else{
      if ($db = initdB()){
      $query = $db->prepare('INSERT INTO like_picture(id_picture, login_like) VALUES(?, ?)');
      $query->execute(array($id_picture, $login));
      }
    }
    $query = $db->prepare('UPDATE picture SET nb = ? WHERE id = ?');
    $query->execute(array($nb, $id_picture));
  }

  function notification($id_picture, $login){
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
        $sujet = 'Someone liked your photo on Camagru';
        $entete = 'From: Camagru.com';
        $message = 'Hello babe,
          '.$login.' just liked your photo! (you are becoming famous babe).

          -------------
          This is an automatic mail, so pls don\'t respond..
        ';
        mail($destinataire, $sujet, $message, $entete);
      }
    }
  }
}
 ?>
