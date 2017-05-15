<?php
  Class OwnGallery extends Gallery{
    public $owner;

    function __construct($db, $imgPerPage, $owner){
      $this->imgPerPage = $imgPerPage;
      $query = $db->prepare('select count(*) as total from picture where
        login_user = ?');
      $query->execute(array($owner));
      $total = $query->fetchAll();
      $this->nbImages = 0 + ceil($total[0]['total']);
      $this->nbPages = $this->nbImages / $this->imgPerPage;
    }
  }
?>
