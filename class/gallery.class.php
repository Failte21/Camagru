<?php
  Class Gallery{

    public $imgPerPage;
    public $nbPages;
    public $nbImages;

    function __construct($db, $imgPerPage){
      $this->imgPerPage = $imgPerPage;
      $query = $db->query('select count(*) as total from picture');
      $total = $query->fetchAll();
      $this->nbImages = 0 + ceil($total[0]['total']);
      $this->nbPages = $this->nbImages / $this->imgPerPage;
    }
  }
?>
