<main id="gallery">
<?php
  include("check/page.php");
  include("class/gallery.class.php");
  include("class/ownGallery.class.php");
  include("class/like.class.php");
  include("class/picture.class.php");
  include("class/page.class.php");
  if ($db = initDb()){
    if (htmlentities($_GET['page']) == 'gallery'){
      $gallery = new Gallery($db, 6);
      $page = new Page($db, htmlentities($_GET['pageNb']), $gallery->imgPerPage);
      $page->displayImg($db, null);
    }else{
      $gallery = new OwnGallery($db, 6, $_SESSION['logged_user']);
      $page = new Page($db, htmlentities($_GET['pageNb']), $gallery->imgPerPage);
      $page->displayImg($db, $_SESSION['logged_user']);
    }
  }
?>
</main>
