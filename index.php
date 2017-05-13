<?php
  session_start();
  ob_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Camagru</title>
    <link rel="stylesheet" href="/camagru2/css/master.css">
    <link rel="stylesheet" href="/camagru2/css/header.css">
    <link rel="stylesheet" href="/camagru2/css/main_form.css">
    <link rel="stylesheet" href="/camagru2/css/main_page.css">
    <link rel="stylesheet" href="/camagru2/css/subscribe_success.css">
    <link rel="stylesheet" href="/camagru2/css/footer.css">
    <link rel="stylesheet" href="/camagru2/css/gallery.css">
    <link rel="stylesheet" href="/camagru2/css/comment.css">
  </head>
  <body>
    <?php
      include("view/header.php");
      include("check/init_db.php");
      include("check/get_page.php");
      if (!isset($_SESSION['logged_user'])){
        if (isset($_GET['subscribe'])){
          include("view/subscribe_success.php");
        }else if (isset($_GET['page'])){
          $page = htmlentities($_GET['page']);
          include(getPage($page));
        }else{
          include("view/main_form.php");
        }
      }else{
        include("check/page.php");
        if (isset($_GET['subscribe'])){
          include("view/subscribe_success.php");
        }else if (!isset($_GET['page'])){
          include("view/main_page.php");
        }else{
          $page = htmlentities($_GET['page']);
          include(getPage($page));
        }
      }
      if (!isset($_SESSION['logged_user']) || isset($_GET['page'])){
        include("view/footer.php");
      }
      ob_end_flush();
    ?>
    <script type="text/javascript" src="js/like.js"></script>
    <script type="text/javascript" src="js/delete_picture.js"></script>
  </body>
</html>
