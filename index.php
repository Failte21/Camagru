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
  </head>
  <body>
    <?php
      include("view/header.php");
      if (!isset($_SESSION['logged_user'])){
        if (isset($_GET['subscribe']) && $_GET['subscribe'] == "success"){
          include("view/subscribe_success.php");
        }else{
          include("view/main_form.php");
        }
      }else{
        if (!isset($_GET['page'])){
          include("view/main_page.php");
        }else{
          include("check/get_page.php");
          include(getPage($_GET['page']));
        }
      }
      include("view/footer.php");
      ob_end_flush();
    ?>
  </body>
</html>
