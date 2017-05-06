<?php
  function getPage($page){
    if ($page == "gallery"){
      return ("view/gallery.php");
    }else{
    }
    return ("view/404.php");
  }
?>
