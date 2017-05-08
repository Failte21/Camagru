<?php
  Class like{

    public $likers = array();

    function __construct($db, $img_id){
      $query = $db->prepare('select login_like
        from like_picture where id_picture = ?');
      $query->execute(array($img_id));
      $likers = $query->fetchAll();
    }
  }
?>
