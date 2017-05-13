<?php
  function getPage($page){
    if ($page == "gallery" || $page == "my_gallery"){
      return ("view/gallery.php");
    }else if ($page == "comment"){
      if (isset($_GET["id"])){
        return ("view/comment.php");
      }
    }else if ($page == "settings"){
      return ("view/settings.php");
    }else if ($page == "resetPassword"){
      return ("view/resetPassword.php");
    }else{
      header("location: ../index.php");
    }
  }
?>
